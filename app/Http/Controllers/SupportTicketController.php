<?php

namespace App\Http\Controllers;

use App\Models\SupportReply;
use App\Models\SupportTicket;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = SupportTicket::all();
        return view('admin.customer.support_ticket', compact('response'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupportTicket $supportTicket)
    {
        //
    }

    public function reply(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $reply = new SupportReply();
        $reply->message = $request->message;
        $reply->support_ticket_id = $request->support_ticket_id;
        $reply->user_id = auth()->id();
        $reply->is_support_reply = true;

        if ($request->has('status')) {
            $ticket =  SupportTicket::findOrFail($request->support_ticket_id);
            $ticket->status = $request->status;
            $ticket->save();
        }

        if ($reply->save()) {
            return redirect()->back()->with('success', 'Your response saved successfully');
        }

        return back()->with('error', 'Something went wrong. Please try again.');
    }
}
