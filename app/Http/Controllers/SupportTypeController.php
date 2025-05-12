<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SupportType;
use Illuminate\Http\Request;

class SupportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = SupportType::all();
        $support = null;
        $categories = collect(Category::where('status', true)->get());
        return view('admin.customer.support_type', compact('response', 'support', 'categories'));
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
        $validated =  $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
        ]);

        $validated['user_id'] = auth()->id();

        SupportType::create($validated);
        return redirect()->back()->with('success', 'Support type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SupportType $supportType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupportType $supportType)
    {
        $response = SupportType::all();
        $support = $supportType;
        $categories = collect(Category::where('status', true)->get());
        return view('admin.customer.support_type', compact('response', 'support', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupportType $supportType)
    {
        $validated =  $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
        ]);

        $validated['user_id'] = auth()->id();

        $supportType->update($validated);
        return redirect()->route('support_type.index')->with('success', 'Support type updated successfully');
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupportType $supportType)
    {
        $supportType->delete();
        return redirect()->route('support_type.index')->with('success', 'Support type deleted successfully');
    }
}
