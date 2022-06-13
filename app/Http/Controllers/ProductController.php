<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

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


    public function temporalSale($id, Request $request)
    {
        $product = Product::findOrfail($id);
        $product->status = 'TemporalSale';

        $product->save();

        return redirect('/products');
    }

    public function temporalSaleDown($id)
    {
        $product = Product::findOrfail($id);
        $product->status = 'Disponible';

        $product->save();

        return redirect('/products/shopping/car');
    }

    public function shopping()
    {
        return view('Products.shopping', [
            'Product' => Product::where('status', 'TemporalSale')->get()
        ],
    );
    }

    public function buyconfirm()
    {
        return view('Products.buyconfirm');
    }
    
}
