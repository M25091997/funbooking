<?php

namespace App\Http\Controllers;

use App\Models\PromotionalPoster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PromotionalPosterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posters = PromotionalPoster::all();
        $response = null;

        return view('admin.discount.promotional_poster', compact('posters', 'response'));
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
        $validated = $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10048',
            'btn_txt' => 'nullable|string',
            'link' => 'nullable|url',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('promotional_posters', 'public');
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['user_id'] = auth()->id();

        PromotionalPoster::create($validated);

        return redirect()->back()->with('success', 'Poseter added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(PromotionalPoster $promotionalPoster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PromotionalPoster $promotionalPoster)
    {
        $posters = PromotionalPoster::all();
        $response = $promotionalPoster;

        return view('admin.discount.promotional_poster', compact('posters', 'response'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PromotionalPoster $promotionalPoster)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10048',
            'btn_txt' => 'nullable|string',
            'link' => 'nullable|url',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('promotional_posters', 'public');
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['user_id'] = auth()->id();

        $promotionalPoster->update($validated);

        return redirect()->back()->with('success', 'Poseter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromotionalPoster $promotionalPoster)
    {
        if ($promotionalPoster->image) {
            Storage::disk('public')->delete($promotionalPoster->image);
        }

        $promotionalPoster->delete();

        return redirect()->route('promotional_poster.index')->with('success', 'Poster deleted successfully.');
    }
}
