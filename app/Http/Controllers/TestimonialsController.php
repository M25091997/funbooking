<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use App\Http\Requests\StoreTestimonialsRequest;
use App\Http\Requests\UpdateTestimonialsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

DB::enableQueryLog();


class TestimonialsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $testimonials=Testimonials::latest()->paginate();
        //dd($testimonials);
        return view('admin.website.testimonials',['testimonials'=>$testimonials,'form'=>'add']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
            'content' => 'required|string|max:1000',
            'rating' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5048',
        ]);

        if ($request->hasFile('image')) {
            $path=Storage::disk('public')->put('testimonials',$request->file('image'));
            $validatedData['image']=$path;
        }
        Testimonials::create($validatedData);
        return redirect()->route('testimonials.index')->with('success', 'Testimonials created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $testimonial)
    {
        //
        $testimonials=Testimonials::latest()->paginate();
        return view('testimonials.details',['testimonial'=>$testimonial,'testimonials'=>$testimonials]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonials $testimonial)
    {
        //
        $testimonials=Testimonials::latest()->paginate();
        //dd($testimonial);
        return view('admin.website.testimonials',['testimonial'=>$testimonial,'testimonials'=>$testimonials,'form'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonials $testimonial)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
            'content' => 'required',
            'rating' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            if($testimonial->image){
                Storage::disk('public')->delete($testimonial->image);
            }
            $path=Storage::disk('public')->put('testimonials',$request->file('image'));
            $validatedData['image']=$path;
        }
        $testimonial->update($validatedData);
        return redirect()->route('testimonials.index')->with('success', 'Testimonial Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonials $testimonial)
    {
        //
        if($testimonial->image){
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('success', 'Testimonials Deleted successfully!');
    }
}
