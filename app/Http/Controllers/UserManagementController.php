<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DataTables;

class UserManagementController extends Controller
{
    /**
     * Display the Add User page.
     */
    public function index()
    {
        return view('profile.add_user');
    }

    /**
     * Display the User List page.
     */
    public function usermanage()
    {
        return view('profile.user_list');
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request)
    {
        // Check if the phone number already exists
        if (User::where('mobile_no', $request->input('phone'))->exists()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'The phone number is already in use.');
        }

        // Additional field validations
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'designation_id' => 'nullable|integer',
            'role' => 'required|in:' . implode(',', array_keys(config('constants.roles'))),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the errors below.');
        }

        try {
            // Create the new user
            User::create([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'mobile_no' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
                'designation_id' => $request->input('designation_id'),
            ]);

            return redirect()->back()->with('success', 'User has been added successfully.');
        } catch (\Exception $e) {
            \Log::error('User Creation Error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    /**
     * Fetch all users for DataTable.
     */
    public function getUsers()
    {
        $users = User::select(['id', 'name', 'username', 'role', 'email', 'mobile_no']);
        return DataTables::of($users)
            ->addColumn('actions', function ($user) {
                return '
                    <button class="btn btn-warning btn-sm edit-btn" data-id="' . $user->id . '">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="' . $user->id . '">Delete</button>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Edit a specific user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update a specific user in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required|in:' . implode(',', array_keys(config('constants.roles'))),
            'phone' => 'nullable|string|max:15|unique:users,mobile_no,' . $user->id,
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user->update($request->all());

        return response()->json(['success' => 'User updated successfully.']);
    }

    /**
     * Remove a specific user from storage.
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(['success' => 'User deleted successfully.']);
    }
}
