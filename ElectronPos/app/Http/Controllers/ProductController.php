<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cattegory;
use Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    //view all the products
    public function viewProducts()
    {
        //$products = Product::orderBy("id", "asc")->get();
        $products = DB::table('cattegories')
        ->leftJoin('products', 'products.category_id', '=', 'cattegories.id')
        ->select('*')
        ->get();
        return view('pages.view-products')->with("products",$products);
    }

    public function searchProductByName(Request $request)
    {
        $query = $request->input('product_name');
        $results = Product::where('name', 'like', "%$query%")->get();
        return view('pages.cart.index')->with("results",$results);
    }

    public function editProduct($id){        
        $products = Product::find($id);
        $cattegories = Cattegory::all();
        return view("pages.update-product")->with("products",$products)->with("cattegories",$cattegories);
    }

    public function getProductById($id){
        $product = Product::find($id);
        if ($product) {
            return response()->json($product);
        }
        return response()->json(['error' => 'Product not found'], 404);
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

        //dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string',
            'barcode' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'unit_of_measurement' => 'required|numeric',
            'category_id' => 'required|integer',
            'quantity' => 'required|string',
            'product_status' => 'required|string|in:active,inactive',
        ]);

        $product = new Product([
            'name' => $validatedData['name'],
            'barcode' => $validatedData['barcode'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'selling_price' =>$validatedData['selling_price'],
            'unit_of_measurement' => $validatedData['unit_of_measurement'],
            'category_id' => $validatedData['category_id'],
            'quantity' => $validatedData['quantity'],
            'product_status' => $validatedData['product_status'],
        ]);
        
        //Save the product to the database and redirect to the dashboard
        $product->save();
        //stock module add the item and then save it as stock
        $stock = new Stock([
            'product_id' => $product->id,
            'quantity' => $validatedData['quantity'], // Adjust as needed
        ]);
        //save the stock
        $stock->save();
        if (!$product) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating product.');
        }
        return redirect()->route('view-products')->with('success', 'Success, your product has been created and added to stock');
        //return redirect()->back()->with('message', 'Product has been added successfully');
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
