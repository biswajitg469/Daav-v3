<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View('customer.add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address_1' => 'required|string|max:255',
            'address_2' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'postcode' => 'required|string|max:6',
            'email' => 'nullable|email|max:255',
            'state' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'name_ship' => 'required|string|max:255',
            'address_1_ship' => 'required|string|max:255',
            'address_2_ship' => 'required|string|max:255',
            'town_ship' => 'required|string|max:255',
            'postcode_ship' => 'required|string|max:6',
            'state_ship' => 'required|string|max:255',
        ]);

        // Create and save a new Customer instance
        $customer = new Customer();
        $customer->fill($validatedData);
        $customer->save();

        // Redirect with success message if save is successful
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');

    } catch (\Exception $e) {
        // Log the error for debugging purposes
        \Log::error('Customer creation failed: ' . $e->getMessage());

        // Redirect back with an error message
        return redirect()->back()->with('error', 'An error occurred while creating the customer. Please try again.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
