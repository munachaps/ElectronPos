<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewEmployees()
    {
        //

        return view("pages.view-employees");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("pages.create-employee");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the form input
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'access_level' => 'required|integer|min:1|max:10',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password',
            'status' => 'required|in:active,not_active',
        ]);

        $userId = Auth::user()->id;
        // Create a new Employee instance
        $employee = new Employee();
        $employee->user_id = $userId;
        $employee->address  = $validatedData['address'];
        $employee->name = $validatedData['first_name'];
        $employee->last_name = $validatedData['last_name'];
        $employee->phone_number = $validatedData['phone_number'];
        $employee->access_level = $validatedData['access_level'];
        $employee->password =   $validatedData['password'];
        $employee->confirm_password = $validatedData['confirm_password'];
        $employee->status = $validatedData['status'];
        // Save the Employee to the database
        $employee->save();
        // Redirect to a success page or return a response
        return redirect()->back()->with('success', 'Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
