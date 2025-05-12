<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Discount::all();
        return view('admin.discount.discount', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = null;
        return view('admin.discount.discount_create', compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'discount_type_id' => 'required|exists:discount_types,id',
            'name' => 'required|string',
            'code' => 'nullable|required',
            'discount' => 'required',
            'type' => 'required',
            'valid_from' => 'required',
            'valid_until' => 'required',
            'usage_limit' => 'nullable',
            'park_id' => 'required|exists:parks,id',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->is_active ? 1 : 0;
        $validated['user_id'] = Auth::id();

        Discount::create($validated);

        return redirect()->back()->with('success', 'Discount created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        $response = $discount;
        return view('admin.discount.discount_create', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $validated =  $request->validate([
            'discount_type_id' => 'required|exists:discount_types,id',
            'name' => 'required|string',
            'code' => 'nullable|required',
            'discount' => 'required',
            'type' => 'required',
            'valid_from' => 'required',
            'valid_until' => 'required',
            'usage_limit' => 'nullable',
            'park_id' => 'required|exists:parks,id',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->is_active ? 1 : 0;
        $validated['user_id'] = Auth::id();

        $discount->update($validated);

        return redirect()->back()->with('success', 'Discount updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->back()->with('success', 'Discount deleted successfully.');
    }
}
