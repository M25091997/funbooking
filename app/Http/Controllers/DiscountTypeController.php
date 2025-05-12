<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DiscountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = DiscountType::all();
        $discount = null;
        $categories = collect(Category::where('status', true)->get());
        return view('admin.discount.discount_type', compact('response', 'discount', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();

        DiscountType::create($validated);
        return redirect()->back()->with('success', 'Discount type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(DiscountType $discountType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiscountType $discountType)
    {
        $response = DiscountType::all();
        $discount = $discountType;
        $categories = collect(Category::where('status', true)->get());
        return view('admin.discount.discount_type', compact('response', 'discount', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DiscountType $discountType)
    {
        $validated =  $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();

        $discountType->update($validated);
        return redirect()->back()->with('success', 'Discount type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiscountType $discountType)
    {
        $discountType->delete();
        return redirect()->route('discount_type.index')->with('success', 'Discount type deleted successfully');
    }
}
