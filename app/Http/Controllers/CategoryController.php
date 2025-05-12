<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

DB::enableQueryLog();


class CategoryController extends Controller
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
        $categories=Category::latest()->paginate();
        //dd($categories);
        return view('admin.masterkey.category',['categories'=>$categories,'form'=>'add']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $validatedData['slug']=Str::slug($validatedData['name']);
        if ($request->hasFile('image')) {
            $path=Storage::disk('public')->put('category',$request->file('image'));
            $validatedData['image']=$path;
        }
        Category::create($validatedData);
        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $testimonial)
    {
        //
        $categories=Category::latest()->paginate();
        return view('categories.details',['testimonial'=>$testimonial,'categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        $categories=Category::latest()->paginate();
        //dd($testimonial);
        return view('admin.masterkey.category',['category'=>$category,'categories'=>$categories,'form'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $validatedData['slug']=Str::slug($validatedData['name']);
        if ($request->hasFile('image')) {
            if($category->image){
                Storage::disk('public')->delete($category->image);
            }
            $path=Storage::disk('public')->put('category',$request->file('image'));
            $validatedData['image']=$path;
        }
        $category->update($validatedData);
        return redirect()->route('category.index')->with('success', 'Category Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        if($category->image){
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category Deleted successfully!');
    }
}
