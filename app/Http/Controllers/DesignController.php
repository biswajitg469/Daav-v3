<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('design.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'design_name' => 'required|string|max:255',
            'design_desc' => 'required|string',
        ]);

        try {
            // Create a new design instance
            $design = new Design();
            $design->name = $request->input('design_name');
            $design->description = $request->input('design_desc');
            $design->save();

            // Set success message in session
            return redirect()->route('design_manage')->with('success', 'Design added successfully!');
        } catch (\Exception $e) {
            // Set error message in session
            dd($e);
            // return redirect()->back()->with('error', 'There was an error adding the design. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the design by ID
        $design = Design::findOrFail($id);

        // Pass the design to the view
        return view('design.edit', compact('design'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'design_name' => 'required|string|max:255',
            'design_desc' => 'required|string',

        ]);

        // Find the design by ID
        $design = Design::findOrFail($id);

        // Update the design's details
        $design->name = $request->input('design_name');
        $design->description = $request->input('design_desc');
        $design->save();

        // Set a success message in session
        return redirect()->route('design_manage')->with('success', 'Design updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the design by ID
        $design = Design::find($id);

        // Check if the design exists
        if (!$design) {
            return redirect()->route('design_manage')
                ->with('error', 'Design not found.');
        }

        // Delete the design
        $design->delete();

        // Redirect with success message
        return redirect()->route('design_manage')
            ->with('success', 'Design deleted successfully.');
    }

    /**
     * Display the manage view with all designs.
     */
    public function manage()
    {
        // Fetch all designs from the database
        $designs = Design::all();

        // Pass the designs to the view
        return view('design.manage', compact('designs'));
    }

    public function downloadPDF()
    {
        // Fetch all products
        $designs = Design::all();

        // Load a view and pass the products data to it
        $pdf = Pdf::loadView('pdf.designs', compact('designs'));

        // Return the PDF as a download
        return $pdf->download('designs_list.pdf');
    }
}
