<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Customer;
use Illuminate\Http\Request;

class CartController extends Controller
{

    //calculating the sales for the day
    public function index(Request $request)
    
    {
        //Get the clients information
        $customers = Customer::orderBy('id', 'DESC')->get();
        //Get the products information
        $products = Product::orderBy('name', 'DESC')->get();
        //Total of sales today
        $totalSalesPerDay = 0;
        $salesToday = Sale::select('total')->where('created', date('Y-m-d'))
            ->get();
        foreach ($salesToday as $sale) {
            $totalSalesPerDay += $sale->total;
        }
        return view(
            'sales.create',
            compact('clients', 'products', 'totalSalesPerDay')
        );
    }


    public function searchCartProduct(Request $request){

        $customers = Customer::all();
        $searchTerm = $request->input('search_product');
        $products = Product::where('name', 'like', "%$searchTerm%")->get();
        return view('pages.cart.index', [
            'products' => $products,
            'customers'=>$customers
        ]);
    }


    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
    
        $product = Product::find($productId);
    
        if ($product) {
            if ($product->stock_quantity >= $quantity) {
                // Update the stock quantity
                $product->stock_quantity -= $quantity;
                $product->save();
    
                // Create an order record or do whatever you need for the sale
    
                return redirect('/sell')->with('success', 'Product sold successfully.');
            } else {
                return redirect('/sell')->with('error', 'Insufficient stock.');
            }
        } else {
            return redirect('/sell')->with('error', 'Product not found.');
        }
    }

    public function changeQty(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);
        $cart = $request->user()->cart()->where('id', $request->product_id)->first();

        if ($cart) {
            // check product quantity
            if ($product->quantity < $request->quantity) {
                return response([
                    'message' => 'Product available only: ' . $product->quantity,
                ], 400);
            }
            $cart->pivot->quantity = $request->quantity;
            $cart->pivot->save();
        }

        return response([
            'success' => true
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id'
        ]);
        $request->user()->cart()->detach($request->product_id);

        return response('', 204);
    }

    public function empty(Request $request)
    {
        $request->user()->cart()->detach();

        return response('', 204);
    }
}
