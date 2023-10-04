<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //return all the customers to the front end and the products
        $customers = Customer::all();
        $products = DB::table('cattegories')
        ->leftJoin('products', 'cattegories.id', '=', 'products.category_id')
        ->leftJoin('users','products.user_id','=','users.id')
        ->select('users.name as username','cattegories.cattegory_name as   category_name',
        'products.name as productName',
        'products.barcode as barcode','products.description as description',
        'products.price as price','products.quantity as quantity','products.created_at as created')
        ->get();
        return view("pages.sell-product")->with("products",$products)->with("customers",$customers);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
