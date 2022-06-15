<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $productspyments = DB::table('productspyments')
        ->join('stores', 'stores.id', '=', 'productspyments.storeId')
        ->join('products', 'products.id', '=', 'productspyments.productId')
        ->select('products.*', 'products.name as productname', 'stores.*', 'productspyments.amount as pymentsamount', 'productspyments.unitprice')
        ->Where('stores.id', $request->store_id)
        ->get();

        $sum = 0;
        foreach ($productspyments as $Product) {
            $sum += $Product->pymentsamount * $Product->unitprice;
        }

        $Stores = Store::all();

        return view('Dashboard.index', [
            'Stores' => $Stores,
            'ProductPyments' => $productspyments,
            'selectedstore_id' => $request->store_id,
            'Sum' => $sum
        ]);
    }


}
