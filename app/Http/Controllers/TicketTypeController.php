<?php

namespace App\Http\Controllers;

use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = TicketType::paginate(15) ?? [];
        return view('admin.masterkey.ticketType', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = null;
        return view('admin.masterkey.ticketType_create', compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rules' => 'nullable',
            'is_active' => 'nullable|boolean',
            'category_id' => 'nullable|exists:categories',
        ]);

        $request['is_active'] = $request->has('is_active') ? 1 : 0;

        TicketType::create($request->all());

        return redirect()->route('ticketType.index')->with('success', 'Ticket type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketType $ticketType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketType $ticketType)
    {
        $response = $ticketType;
        return view('admin.masterkey.ticketType_create', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TicketType $ticketType)
    {
        $request->validate([
            'name' => 'required',
            'rules' => 'nullable',
            'is_active' => 'nullable|boolean',
            'category_id' => 'nullable|exists:categories',
        ]);

        $request['is_active'] = $request->has('is_active') ? 1 : 0;

        $ticketType->update($request->all());

        return redirect()->route('ticketType.index')->with('success', 'Ticket type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketType $ticketType)
    {
        $ticketType->delete();

        return redirect()->route('ticketType.index')->with('success', 'Ticket type deleted successfully.');
    }
}
