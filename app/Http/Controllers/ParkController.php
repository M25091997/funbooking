<?php

namespace App\Http\Controllers;

use App\Models\Park;
use App\Http\Requests\ParkRequest;

use App\Models\Category;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ParkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            $parks = Park::where('is_active', true)->latest()->paginate();
        } else {
            $parks = Park::where('user_id', $user->id)
                ->where('is_active', true)
                ->latest()
                ->paginate();
        }

        // $parks = Park::join('categories', 'parks.category_id', '=', 'categories.id')
        //     ->select('parks.*', 'categories.name as category_name')->latest()->paginate();
        //dd($faqs);
        return view('admin.parks.parklist', ['parks' => $parks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::get();
        $areas = Area::get()->where('type', 'State');
        return view('admin.parks.park', ['form' => 'add', 'categories' => $categories, 'areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParkRequest $request)
    {
        $validated = $request->validated();

        // Ensure closing_days is always an array
        $closingDays = json_encode($validated['closing_days'] ?? []);

        $park = Park::create([
            'name' =>  $validated['name'],
            'slug' => Park::generateUniqueSlug($validated['name']),
            'category_id' =>  $validated['category_id'],
            'state' =>  $validated['state'],
            'area_id' =>  $validated['area_id'],
            'district' =>  $validated['district'],
            'address' =>  $validated['address'],
            'location' =>  $validated['location'],
            'opening_time' =>  $validated['opening_time'],
            'closing_time' =>  $validated['closing_time'],
            'booking_threshold' =>  $validated['booking_threshold'],
            'attraction' => $validated['attraction'],
            'closing_days' => $closingDays,
            'helpline' =>  $validated['helpline'],
            'user_id' => Auth::user()->id,
        ]);

        // Store Ticket Prices
        foreach ($validated['ticket_type_id'] as $key => $ticket_type_id) {
            $park->ticketPrices()->create([
                'ticket_type_id' => $ticket_type_id,
                'mrp' => $validated['mrp'][$key],
                'price' => $validated['price'][$key],
            ]);
        }

        // Store Images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('park_images', 'public');
                $park->parkImage()->create(['path' => $path]); // Fixed relationship name
            }
        }

        return redirect()->route('parks.index')->with('success', 'Park added successfully.');
    }

    public function update(ParkRequest $request, Park $park)
    {
        $validated = $request->validated();

        // Ensure closing_days is always stored as JSON
        $closingDays = json_encode($validated['closing_days'] ?? []);

        // Update Park Details
        $park->update([
            'name' =>  $validated['name'],
            'slug' => Park::generateUniqueSlug($validated['name'], $park->id),
            'category_id' =>  $validated['category_id'],
            'state' =>  $validated['state'],
            'area_id' =>  $validated['area_id'],
            'district' =>  $validated['district'],
            'address' =>  $validated['address'],
            'location' =>  $validated['location'],
            'opening_time' =>  $validated['opening_time'],
            'closing_time' =>  $validated['closing_time'],
            'booking_threshold' =>  $validated['booking_threshold'],
            'attraction' => $validated['attraction'],
            'closing_days' => $closingDays,
            'helpline' =>  $validated['helpline'],
        ]);

        // Fetch existing ticket prices
        $existingPrices = $park->ticketPrices->keyBy('ticket_type_id');

        $newTicketTypeIds = $validated['ticket_type_id'] ?? [];

        // Update or Create Ticket Prices
        foreach ($newTicketTypeIds as $key => $ticket_type_id) {
            if ($existingPrices->has($ticket_type_id)) {
                // Update existing ticket price
                $existingPrices[$ticket_type_id]->update([
                    'mrp' => $validated['mrp'][$key],
                    'price' => $validated['price'][$key],
                ]);
                $existingPrices->forget($ticket_type_id);
            } else {
                // Add new ticket price
                $park->ticketPrices()->create([
                    'ticket_type_id' => $ticket_type_id,
                    'mrp' => $validated['mrp'][$key],
                    'price' => $validated['price'][$key],
                ]);
            }
        }

        // Delete removed ticket prices
        if ($existingPrices->isNotEmpty()) {
            $park->ticketPrices()->whereIn('ticket_type_id', $existingPrices->keys())->delete();
        }

        // Update Images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('park_images', 'public');
                $park->parkImage()->create(['path' => $path]);
            }
        }

        return redirect()->route('parks.index')->with('success', 'Park updated successfully.');
    }



    public function store_v2(ParkRequest $request)
    {
        $validated = $request->validated();

        // dd($validated);

        $park = Park::create([
            'name' =>  $validated['name'],
            'slug' => Park::generateUniqueSlug($validated['name']),
            'category_id' =>  $validated['category_id'],
            'state' =>  $validated['state'],
            'area_id' =>  $validated['area_id'],
            'district' =>  $validated['district'],
            'address' =>  $validated['address'],
            'location' =>  $validated['location'],
            'opening_time' =>  $validated['opening_time'],
            'closing_time' =>  $validated['closing_time'],
            'booking_threshold' =>  $validated['booking_threshold'],
            'attraction' => $validated['attraction'],
            'closing_days' => json_encode($validated['closing_days'] ?? []),
        ]);

        foreach ($validated['ticket_type_id'] as $key => $ticket_type_id) {
            $park->ticketPrices()->create([
                'ticket_type_id' => $ticket_type_id,
                'mrp' => $validated['mrp'][$key],
                'price' => $validated['price'][$key],
            ]);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('park_images', 'public');
                $park->parkImage()->create(['path' => $path]);
            }
        }

        return redirect()->route('parks.index')->with('success', 'Park added successfully.');
    }




    public function store_v1(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'address' => 'required',
            'area_id' => 'required',
            'state' => 'required',
            'district' => 'required',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'location' => 'required',
            'booking_threshold' => 'required'
        ]);
        $validatedData['slug'] = Park::generateUniqueSlug($validatedData['name']);
        //dd($validatedData);
        $validatedData['status'] = true;
        Park::create($validatedData);
        return redirect()->route('parks.index')->with('success', 'Park Added successfully!');
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
    public function edit(Park $park)
    {
        //
        $categories = Category::get();
        $areas = Area::get()->where('type', 'State');
        return view('admin.parks.park', ['form' => 'edit', 'park' => $park, 'categories' => $categories, 'areas' => $areas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_v1(Request $request, Park $park)
    {
        $validated = $request->validated();

        // dd($validated);

        $park = Park::create([
            'name' =>  $validated['name'],
            'slug' => Park::generateUniqueSlug($validated['name'], $park->id),
            'category_id' =>  $validated['category_id'],
            'state' =>  $validated['state'],
            'area_id' =>  $validated['area_id'],
            'district' =>  $validated['district'],
            'address' =>  $validated['address'],
            'location' =>  $validated['location'],
            'opening_time' =>  $validated['opening_time'],
            'closing_time' =>  $validated['closing_time'],
            'booking_threshold' =>  $validated['booking_threshold'],
            'attraction' => $validated['attraction'],
            'closing_days' => json_encode($validated['closing_days'] ?? []),
        ]);

        foreach ($validated['ticket_type_id'] as $key => $ticket_type_id) {
            $park->ticketPrices()->create([
                'ticket_type_id' => $ticket_type_id,
                'mrp' => $validated['mrp'][$key],
                'price' => $validated['price'][$key],
            ]);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('park_images', 'public');
                $park->parkImage()->create(['path' => $path]);
            }
        }

        $park->update($validated);
        return redirect()->route('parks.index')->with('success', 'Park Updated successfully!');


        //
        $validatedData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'address' => 'required',
            'area_id' => 'required',
            'state' => 'required',
            'district' => 'required',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'location' => 'required',
            'booking_threshold' => 'required'
        ]);

        $validatedData['slug'] = Park::generateUniqueSlug($validatedData['name'], $park->id);
        $park->update($validatedData);
        return redirect()->route('parks.index')->with('success', 'Park Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Park $park)
    {
        //
        $park->delete();
        return redirect()->route('parks.index')->with('success', 'Park Deleted successfully!');
    }
}
