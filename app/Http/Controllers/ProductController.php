<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View('product.add');
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
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_desc' => 'required|string',
            'product_price' => 'required|numeric|min:0',
        ]);

        try {
            // Create a new product instance
            $product = new Product();
            $product->name = $request->input('product_name');
            $product->description = $request->input('product_desc');
            $product->price = $request->input('product_price');
            $product->save();

            // Set success message in session
            return redirect()->back()->with('success', 'Product added successfully!');
        } catch (\Exception $e) {
            // Set error message in session
            return redirect()->back()->with('error', 'There was an error adding the product. Please try again.');
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
    // Show the edit form for a specific product
    public function edit(string $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Pass the product to the view
        return view('product.edit', compact('product'));
    }

    // Update the specified resource in storage
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_desc' => 'required|string',
            'product_price' => 'required|numeric|min:0',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update the product's details
        $product->name = $request->input('product_name');
        $product->description = $request->input('product_desc');
        $product->price = $request->input('product_price');
        $product->save();

        // Set a success message in session
        return redirect()->route('product_manage')->with('success', 'Product updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product by ID
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            return redirect()->route('product_manage')
                ->with('error', 'Product not found.');
        }

        // Delete the product
        $product->delete();

        // Redirect with success message
        return redirect()->route('product_manage')
            ->with('success', 'Product deleted successfully.');
    }


    public function manage(Request $request)
    {
        // Fetch all products from the database
        $products = Product::all();

        // Pass the products to the view
        return view('product.manage', compact('products'));
    }

    public function downloadPDF()
    {
        // Fetch all products
        $products = Product::all();

        // Load a view and pass the products data to it
        $pdf = Pdf::loadView('pdf.products', compact('products'));

        // Return the PDF as a download
        return $pdf->download('products_list.pdf');
    }

    public function fetchProduct()
    {
        $products = Product::all(); // Fetch all products from the database
        return response()->json($products);
    }
}
