<?php

namespace App\Http\Controllers;

use App\Models\Bannerimages;
use App\Http\Requests\StoreBannerimagesRequest;
use App\Http\Requests\UpdateBannerimagesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerimagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bannerimages=Bannerimages::latest()->paginate(10);
        return view('admin.website.bannerimages',['bannerimages'=>$bannerimages,'form'=>'add']);
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
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'link' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $validatedData['status'] = true;
        if ($request->hasFile('image')) {
            $path=Storage::disk('public')->put('banner',$request->file('image'));
            $validatedData['image']=$path;
        }
        Bannerimages::create($validatedData);
        return redirect()->route('bannerimages.index')->with('success', 'Banner Image added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bannerimages $bannerimages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bannerimages $bannerimage)
    {
        //
        $bannerimages=Bannerimages::latest()->paginate(10);
        return view('admin.website.bannerimages',['bannerimages'=>$bannerimages,'bannerimage'=>$bannerimage,'form'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bannerimages $bannerimage)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'link' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            if($bannerimage->image){
                Storage::disk('public')->delete($bannerimage->image);
            }
            $path=Storage::disk('public')->put('banner',$request->file('image'));
            $validatedData['image']=$path;
        }
        $bannerimage->update($validatedData);
        return redirect()->route('bannerimages.index')->with('success', 'Banner Image Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bannerimages $bannerimage)
    {
        //
        if($bannerimage->image){
            Storage::disk('public')->delete($bannerimage->image);
        }
        $bannerimage->delete();
        return redirect()->route('bannerimages.index')->with('success', 'Banner Image Deleted successfully!');
    }
}
