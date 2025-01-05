<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the latest ID from the invoice.order_info table
        $latestOrderId = DB::table('invoice.order_info')->latest('id')->value('id');

        // Calculate the next ID (i.e., latest ID + 1)
        $nextOrderId = $latestOrderId ? $latestOrderId + 1 : 1;  // If no records exist, start from 1

        // Dump the next ID for debugging
        // dd($nextOrderId);

        // Pass the nextOrderId to the view
        return view('order.orderadd', ['orderId' => $nextOrderId]);
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
        $designation = Auth::user()->designation_id;
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        // Validate incoming request
        $request->validate([
            'customer_id' => 'required|integer',
            'order_product.*' => 'required|string',
            'order_product_id.*' => 'required|integer',
            'order_color_front.*' => 'required|string',
            'order_color_back.*' => 'required|string',
            'order_design_id.*' => 'required|integer',
            'order_order_height.*' => 'required|numeric',
            'order_order_width.*' => 'required|numeric',
            'order_billing_height.*' => 'required|numeric',
            'order_billing_width.*' => 'required|numeric',
            'order_product_qty.*' => 'required|integer',
            'order_door_skin.*' => 'required|string', // Added validation for design_name
        ]);

        DB::beginTransaction();

        try {
            // Insert data into invoice.order_info
            $orderInfoId = DB::table('invoice.order_info')->insertGetId([
                'ord_date' => now(),
                'customer_id' => $request->input('customer_id'),
                'add_note' => $request->input('order_notes'),
                'email_msg' => $request->input('custom_email'),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Prepare data for invoice.order_item
            $orderItems = [];
            $products = $request->input('order_product');
            $productIds = $request->input('order_product_id');
            $frontColors = $request->input('order_color_front');
            $backColors = $request->input('order_color_back');
            $designIds = $request->input('order_design_id');
            $heights = $request->input('order_order_height');
            $widths = $request->input('order_order_width');
            $cutHeights = $request->input('order_billing_height');
            $cutWidths = $request->input('order_billing_width');
            $quantities = $request->input('order_product_qty');
            $doorSkins = $request->input('order_door_skin'); // Fetching design_name array

            foreach ($products as $index => $product) {
                $orderItems[] = [
                    'order_id' => $orderInfoId,
                    'product_id' => $productIds[$index],
                    'product_name' => $product,
                    'color_front' => $frontColors[$index],
                    'color_back' => $backColors[$index],
                    'design_id' => $designIds[$index],
                    'design_name' => $doorSkins[$index], // Using order_door_skin for design_name
                    'order_height' => $heights[$index],
                    'order_width' => $widths[$index],
                    'cutting_height' => $cutHeights[$index],
                    'cutting_width' => $cutWidths[$index],
                    'qty' => $quantities[$index],
                    'is_active' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'created_by' => $user_id,
                    'username' => $user_name,
                    'designation_id' => $designation
                ];
            }

            // Insert data into invoice.order_item
            DB::table('invoice.order_item')->insert($orderItems);

            DB::commit();

            // Set success message in session
            Session::flash('success', 'Order created successfully.');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the exception (optional)
            \Log::error('Order creation failed: ' . $e->getMessage());

            // Set error message in session
            Session::flash('error', 'Failed to create order. Please try again.');

            return redirect()->back()->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
