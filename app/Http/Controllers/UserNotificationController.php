<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = UserNotification::all();
        return view('admin.customer.user_notification', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = null;
        $users = User::all();
        return view('admin.customer.push_user_notification', compact('response', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'title' => 'required|string',
            'message' => 'required|string|max:100',
            'user_id' => 'nullable',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5048',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('notifications', 'public');
        }

        UserNotification::create($validated);

        return redirect()->route('user_notification.index')->with('success', 'Notification sended successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserNotification $userNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserNotification $userNotification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserNotification $userNotification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserNotification $userNotification)
    {
        $userNotification->delete();
        return redirect()->route('user_notification.index')->with('success', 'Notification deleted successfully.');
    }
}
