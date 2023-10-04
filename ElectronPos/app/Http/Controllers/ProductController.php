<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cattegory;
use Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     //view all the products
    public function viewProducts()
    {
        $products = Product::all();
        return view('pages.view-products')->with("products",$products);
    }

    public function editProduct($id){        
        $products = Product::find($id);
        $cattegories = Cattegory::all();
        return view("pages.update-product")->with("products",$products)->with("cattegories",$cattegories);
    }

    public function deleteProduct($id){

        $product = Product::find($id);
        $product->delete();

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return the cattegories for the product to the view
        $cattegories = Cattegory::all();
        $user = Auth::user();
        return view("pages.add-product")->with("cattegories",$cattegories)->with("user",$user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'barcode' => $request->barcode,
            'price' => $request->price,
            'category_id' => $request->cattegory_id,
            'user_id' => $user->id,
            'quantity' => $request->quantity,
            'status' => $request->status
        ]);
        
        if (!$product) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating product.');
        }
        return redirect()->route('dashboard')->with('success', 'Success, you product have been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
