<?php

namespace App\Http\Controllers;

use App\Models\Park;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        //    $user = User::findOrFail($user->id);

        //    return  $roles = $user->roles;

        if ($user->hasRole('Admin')) {
            $response = Staff::latest()->get();
        } else {
            $response = Staff::whereIn('park_id', $user->park->pluck('id'))->latest()->get();
        }

        return view('admin.staff.staffList', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            $parks = Park::where('is_active', true)->latest()->get();
        } else {
            $parks = Park::where('user_id', $user->id)->where('is_active', true)->latest()->get();
        }

        $roles = Role::where('user_id', $user->id)->latest()->get();
        $response  = null;
        return view('admin.staff.staffCreate', compact('response', 'roles', 'parks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'park_id' => 'required|exists:parks,id',
            'role' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
            'aadhaar_no' => 'required|string|max:12',
            'address' => 'required|string',
            'remarks' => 'nullable|string',
            'document' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:2048',
            'photo' => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->mobile),
        ]);

        // Assign role
        $user->assignRole($request->role);

        // Store staff details
        Staff::create([
            'user_id' => $user->id,
            'category_id' => $request->category_id,
            'park_id' => $request->park_id,
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'aadhaar_no' => $request->aadhaar_no,
            'address' => $request->address,
            'remarks' => $request->remarks,
            'is_active' => $request->has('is_active'),
            'document' => $request->file('document') ? $request->file('document')->store('staff/documents') : null,
            'photo' => $request->file('photo') ? $request->file('photo')->store('staff/photos') : null,
        ]);

        return redirect()->route('staff.index')->with('success', 'User and Staff added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        $user = Auth::user();
        if ($user->hasRole('Admin')) {
            $parks = Park::where('is_active', true)->latest()->get();
        } else {
            $parks = Park::where('user_id', $user->id)->where('is_active', true)->latest()->get();
        }

        $roles = Role::where('user_id', $user->id)->latest()->get();
        $response  = $staff;
        return view('admin.staff.staffCreate', compact('response', 'roles', 'parks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $user = User::findOrFail($staff->user_id);
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'park_id' => 'required|exists:parks,id',
            'role' => 'required|string|exists:roles,name',
            'name' => 'required|string',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'mobile' => 'nullable|unique:users,mobile,' . $user->id,
            'aadhaar_no' => 'required|string|max:12',
            'address' => 'required|string',
            'remarks' => 'nullable|string',
            'document' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:2048',
            'photo' => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

       

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]);

        // Change role
        if ($request->role !== $user->roles->first()?->name) {
            $user->syncRoles([$request->role]);
        }

        if ($staff) {
            $staff->update([
                'category_id' => $request->category_id,
                'park_id' => $request->park_id,
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'aadhaar_no' => $request->aadhaar_no,
                'address' => $request->address,
                'remarks' => $request->remarks,
                'is_active' => $request->has('is_active'),
                'document' => $request->file('document') ? $request->file('document')->store('staff/documents') : $staff->document,
                'photo' => $request->file('photo') ? $request->file('photo')->store('staff/photos') : $staff->photo,
            ]);
        }

        return redirect()->route('staff.index')->with('success', 'User and Staff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
