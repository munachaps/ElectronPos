<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Product;
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
        //get the data for the clients and the products..
        $clients = Customer::orderBy('id', 'DESC')->get();
        //Get the products information
        $products = Product::orderBy('name', 'DESC')->get();
        //Total of sales today
        $totalSalesPerDay = 0;
        $salesToday = Sales::select('total')->where('created', date('Y-m-d'))
            ->get();
        foreach ($salesToday as $sale) {
            $totalSalesPerDay += $sale->total;
        }
        //return view for creating the sales....
        return view(
            'pages.sales.create',
            compact('clients', 'products', 'totalSalesPerDay')
        );
    }

    public function create()
    {
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
