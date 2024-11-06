<?php

namespace App\Http\Controllers;

use App\Models\Desing;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View('desing.add_desing');
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
        // dd($request->all());
        $request->validate([
            'design_name' => 'required|string|max:255',
            'design_desc' => 'required|string',
        ]);

        try {
            // dd('dfggfdsg');
            // Create a new product instance
            $product = new Desing();
            $product->name = $request->input('design_name');
            // dd($product);
            $product->description = $request->input('design_desc');
            $product->save();
            // dd($product);


            // Set success message in session
            return redirect()->back()->with('success', 'Desing added successfully!');
        } catch (\Exception $e) {
            // Set error message in session
            return redirect()->back()->with('error', 'There was an error adding the Desing. Please try again.');
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
