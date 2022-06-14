<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Products.index', [
                'Product' => Product::where('stock', '>', '0')->get()
            ],
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|min:3',
            'SKU' => 'required',
            'description' => 'required|min:3',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->get('name');
        $product->SKU = $request->get('SKU');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');

        $product->save();
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrfail($id);

        return view('Products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'name' => 'required|min:3',
            'SKU' => 'required',
            'description' => 'required|min:3',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $product = Product::findOrfail($id);
        $product->name = $request->get('name');
        $product->SKU = $request->get('SKU');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');

        $product->save();
        return redirect('/products');
    }

    public function confirmDelete($id)
    {
        $product = Product::findOrfail($id);
        return view('Products.confirmDelete', [
            'product' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrfail($id);
        $product->delete();

        return redirect('products/');
    }


    //Cambia el Estado del producto a TemporalSale y adiciona cantidad de producto
    public function temporalSale(Request $request, $id)
    {
        $validData = $request->validate([
            'amount' => 'min:1',
        ]);

        $product = Product::findOrfail($id);
               
        $product->status = 'TemporalSale';
        $product->amount = $request->get('amount');
        $product->total = $request->get('amount') * $product->price ;

        $product->save();
        return redirect('/products');   
        

    }


    //Elimina producto de carrito de compras
    public function temporalSaleDown($id)
    {
        $product = Product::findOrfail($id);
        $product->status = 'Disponible';

        $product->save();

        return redirect('/products/shopping/car');
    }

    public function temporalPlus($id)
    {
        $product = Product::findOrfail($id);
        $product->amount = $product->amount + 1;
        $product->total = $product->amount * $product->price;

        $product->save();

        return redirect('/products/shopping/car');
    }

    public function temporalMinus($id)
    {
        $product = Product::findOrfail($id);

        $product->amount = $product->amount - 1;
        $product->total = $product->amount * $product->price;

        $product->save();

        return redirect('/products/shopping/car');
    }

    public function shopping()
    {
        return view('Products.shopping', [
            'Product' => Product::where('status', 'TemporalSale')->get()
        ],
        [
            'Store' => Store::all()
        ]
    );
    }


    public function buyconfirm(Request $request)
    {
        $Store = Store::findOrfail($request->store_id);

        $Product = Product::Where('status', 'TemporalSale')->get();

        foreach ($Product as $Product) 
        {
            DB::table('productspyments')
            ->insert([
                'productId' => $Product->id,
                'storeId' => $Store->id,
                'amount' => $Product->amount,
                'unitprice' => $Product->price
            ]);

            Product::findOrfail($Product->id)->update(['status' => 'Comprado', 'stock' => $Product->stock - $Product->amount]);

        }

        return redirect()->route('dashboard');
        
    }

    

}
