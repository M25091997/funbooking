<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionBenefit;
use Illuminate\Http\Request;

class SubscriptionBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = subscriptionBenefit::all();
        return view('admin.subscription.subscription_benefit', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = null;
        return view('admin.subscription.subscription_benefit-create', compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'plan_id' => 'required|exists:plans,id',
            'park_id' => 'nullable|exists:parks,id',
            'name' => 'required|string|max:255',
            'discount' => 'nullable|required_with:type',
            'type' => 'nullable|required_with:discount',
            'is_active' => 'nullable|boolean',
        ]);

        $subscriptionBenefit = new subscriptionBenefit();
        $subscriptionBenefit->category_id = $request->category_id;
        $subscriptionBenefit->name = $request->name;
        $subscriptionBenefit->plan_id = $request->plan_id;
        $subscriptionBenefit->park_id = $request->park_id;
        $subscriptionBenefit->discount = $request->discount;
        $subscriptionBenefit->type = $request->type;
        $subscriptionBenefit->is_active = $request->is_active ? true : false;
        $subscriptionBenefit->user_id = auth()->id();

        if ($subscriptionBenefit->save()) {
            return redirect()->route('subscriptionBenefit.index')->with('success', 'subscription benefit added successfully');
        }

        return back()->with('error', 'Something went wrong. Please try again.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubscriptionBenefit $subscriptionBenefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubscriptionBenefit $subscriptionBenefit)
    {
        $response = $subscriptionBenefit;
        return view('admin.subscription.subscription_benefit-create', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubscriptionBenefit $subscriptionBenefit)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'plan_id' => 'required|exists:plans,id',
            'park_id' => 'nullable|exists:parks,id',
            'name' => 'required|string|max:255',
            'discount' => 'nullable|required_with:type',
            'type' => 'nullable|required_with:discount',
            'is_active' => 'nullable|boolean',
        ]);
        
        $subscriptionBenefit->category_id = $request->category_id;
        $subscriptionBenefit->name = $request->name;
        $subscriptionBenefit->plan_id = $request->plan_id;
        $subscriptionBenefit->park_id = $request->park_id;
        $subscriptionBenefit->discount = $request->discount;
        $subscriptionBenefit->type = $request->type;
        $subscriptionBenefit->is_active = $request->is_active ? true : false;
        $subscriptionBenefit->user_id = auth()->id();

        if ($subscriptionBenefit->update()) {
            return redirect()->route('subscriptionBenefit.index')->with('success', 'subscription benefit updated successfully');
        }
        return back()->with('error', 'Something went wrong. Please try again.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubscriptionBenefit $subscriptionBenefit)
    {
        $subscriptionBenefit->delete();
        return redirect()->route('subscriptionBenefit.index')->with('success', 'subscription benefit deleted successfully');
    }
}
