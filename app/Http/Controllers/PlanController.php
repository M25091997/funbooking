<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Plan::all();
        return view('admin.subscription.plan', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = null;
        return view('admin.subscription.plan-create', compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration_days' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $plan = new Plan();
        $plan->category_id = $request->category_id;
        $plan->name = $request->name;
        $plan->description = $request->description;
        $plan->duration_days = $request->duration_days;
        $plan->price = $request->price;
        $plan->is_active = $request->is_active ? true : false;
        $plan->user_id = auth()->id();

        if ($plan->save()) {
            return redirect()->route('plan.index')->with('success', 'Plan added successfully');
        }

        return back()->with('error', 'Something went wrong. Please try again.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        $response = $plan;
        return view('admin.subscription.plan-create', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration_days' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'is_active' => 'nullable|boolean',
        ]);


        $plan->category_id = $request->category_id;
        $plan->name = $request->name;
        $plan->description = $request->description;
        $plan->duration_days = $request->duration_days;
        $plan->price = $request->price;
        $plan->is_active = $request->is_active ? true : false;
        $plan->user_id = auth()->id();

        if ($plan->update()) {
            return redirect()->route('plan.index')->with('success', 'Plan updated successfully');
        }
        return back()->with('error', 'Something went wrong. Please try again.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('plan.index')->with('success', 'Plan deleted successfully');
    }
}
