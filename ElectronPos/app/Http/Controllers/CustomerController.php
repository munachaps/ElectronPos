<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewAllCustomers()
    {
        //
        //$customers = Customer::all();
        //$products = Db::table('select * from products order by id desc')->get();
        $customers = DB::table('customers')
        ->leftJoin('users', 'customers.user_id', '=', 'users.id')
        ->select('*')
        ->get();
        return view("pages.view-customers")->with("customers",$customers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("pages.create-customer");
    }

    public function store(Request $request)
    {    
            $user = Auth::user()->id;
            $customer = Customer::create([
            'code' => $request->code,
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_phonenumber' => $request->customer_phonenumber,
            'customer_taxnumber' => $request->customer_taxnumber,
            'customer_city' => $request->customer_city,
            'customer_address' => $request->customer_address,
            'user_id' => $user,
        ]);
        
        if (!$customer) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating a customer.');
        }
        return redirect()->route('dashboard')->with('success', 'Success, you customer have been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    public function deleteCustomer($id){

        $customer = Customer::find($id);
        $customer->delete();
        return view('view-customers');


    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
