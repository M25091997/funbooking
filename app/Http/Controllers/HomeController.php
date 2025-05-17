<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function reviews()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                $response =  Review::all();
            } else {
                $response =  Review::where('user_id', $user->id)->get();
            }

            return view('admin.parks.reviews', compact('response'));
        }
    }

    public function review_delete(Review $review)
    {
        $review->delete();
        return redirect()->back()->with('success', 'Review deleted successfully');
    }

    public function review_updateStatus(Request $request, Review $review)
    {
        $review->status = $request->status;
        $review->save();
        return response()->json(['status' => true, 'message' => 'Status updated successfully']);
    }
    public function CheckoutFun(Request $request, $orderId)
    {
        $booking = Booking::where('order_id', $orderId)->first();
        return view("website.checkout", compact('booking'));
    }
}
