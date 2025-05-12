<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use Illuminate\Http\Request;

class FaqController extends Controller
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
        $faqs=Faq::latest()->paginate();
        //dd($faqs);
        return view('admin.website.faqlist',['faqs'=>$faqs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.website.faq',['form'=>'add']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'section' => 'required|max:20',
            'question' => 'required',
            'answer' => 'required'
        ]);
        $validatedData['status'] = true;
        Faq::create($validatedData);
        return redirect()->route('faq.index')->with('success', 'FAQ Added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $faq)
    {
        //
        //$faqs=Faq::latest()->paginate();
        //return view('faqs.details',['faq'=>$faq,'faqs'=>$faqs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
        $faqs=Faq::latest()->paginate();
        //dd($faq);
        return view('admin.website.faq',['faq'=>$faq,'faqs'=>$faqs,'form'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        //
        $validatedData = $request->validate([
            'section' => 'required|max:20',
            'question' => 'required',
            'answer' => 'required'
        ]);
        
        $faq->update($validatedData);
        return redirect()->route('faq.index')->with('success', 'FAQ Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        //
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ Deleted successfully!');
    }
}
