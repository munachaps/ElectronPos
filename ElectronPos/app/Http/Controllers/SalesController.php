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

    //view for making the sales (view will return the total sales also to the blade file)
    public function index()
    {
        $products = Product::all();
        return view("pages.sales.create")->with("products",$products);

        //get the data for the clients and the products..
       // $clients = Customer::orderBy('id', 'DESC')->get();
        //Get the products information
        //$products = Product::orderBy('name', 'DESC')->get();
        //Total of sales today
        //$totalSalesPerDay = 0;
        //$salesToday = Sales::select('total')->where('created', date('Y-m-d'))
        //    ->get();
        //foreach ($salesToday as $sale) {
          //  $totalSalesPerDay += $sale->total;
       // }
        //return view for creating the sales....
        //return view(
          //  'pages.sales.create',
            //compact('clients', 'products', 'totalSalesPerDay')
        //);
    }

    //make the sale and store the sale into the sales table. add the sales to the cart and fill the cart
    public function store(SaleRequest $request)
    {

        echo "hello world";
       /* $sale = Sales::create(
            [
                'total'   => $request->input('total'),
                'rfc'     => $request->input('rfc'),
                'id'      => $request->input('id'),
                'created' => date('Y-m-d')
            ]
        );

        if (isset($sale)) {
            $productsArray = (array)json_decode($request->input('products'));
            $completed = [];
            //Get the products sales
            foreach ($productsArray as $index) {
                $cart = new Cart();
                $cart->sale_id = $sale->sale_id;
                $cart->product_id = $index->id;
                $cart->amount = $index->amount;
                $cart->created = date('Y-m-d');
                $cart->save();
                $completed[] = $cart;
            }

            if (count($productsArray) === count($completed)) {
                return new Response($completed, 201);
            }
        }
        return new Response('Cart was not filled', 500)*/;
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
