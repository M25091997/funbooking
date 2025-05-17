<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Billing;
use App\Models\BookingDetails;
use App\Models\Discount;
use App\Models\Park;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bookingList()
    {
        $records = Booking::latest()->paginate(20);
        return view('admin.customer.bookingList', compact('records'));
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


    public function bookingCheckout(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|exists:parks,slug',
            'booking_date' => 'required|date_format:d/m/Y|after_or_equal:today',
            'ticket_types' => 'required|array|min:1',
            'ticket_types.*' => 'required|distinct|exists:ticket_types,id',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer|min:1'
        ]);

        DB::beginTransaction();

        try {
            $userId = auth()->id() ?? 1;
            $park = Park::where('slug', $request->slug)->firstOrFail();

            $totalPrice = 0;
            $totalMrp = 0;
            $bookingItems = [];

            foreach ($request->ticket_types as $index => $ticketTypeId) {
                $quantity = $request->quantity[$index] ?? 1;

                $ticketPrice = \App\Models\TicketPrice::where([
                    'park_id' => $park->id,
                    'ticket_type_id' => $ticketTypeId
                ])->firstOrFail();

                $totalPrice += $ticketPrice->price * $quantity;
                $totalMrp += $ticketPrice->mrp * $quantity;

                $bookingItems[] = [
                    'ticket_type_id' => $ticketTypeId,
                    'quantity' => $quantity,
                    'price' => $ticketPrice->price,
                    'mrp' => $ticketPrice->mrp,
                ];
            }

            $invoice = 'INV-' . $park->id . '-' . now()->format('YmdHis') . rand(100, 999);

            $booking = Booking::create([
                'user_id' => $userId,
                'order_id' => 'BK' . $userId . '00' . now()->timestamp,
                'invoice_no' => $invoice,
                'park_id' => $park->id,
                'park_details' => json_encode($park),
                'booking_date' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->booking_date)->format('Y-m-d'),
                'total_amount' => $totalPrice,
                'booking_status' => 'Pending',
            ]);

            foreach ($bookingItems as $item) {
                $item['booking_id'] = $booking->id;
                \App\Models\BookingDetails::create($item);
            }

            DB::commit();

            return redirect()->route('booking.payment', $booking->order_id)->with('success', 'Checkout created. Please complete payment.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Checkout failed: ' . $e->getMessage());
        }
    }



    public function completeBooking(Request $request, $orderId)
    {
        $booking = Booking::where('order_id', $orderId)->first();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'coupan_code' => 'nullable|string',
            // 'method' => 'required|in:Cash,Online,Check or Draft',
            // 'transaction_mode' => 'required|string',
            // 'signature' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $discount = 0;
            $totalTax = 0;

            if ($request->has('coupan_code')) {
                $coupan = Discount::where([
                    'code' => $request->coupan_code,
                    'park_id' => $booking->park_id
                ])->first();

                if (!$coupan || $coupan->valid_until < now() || $coupan->usage_limit <= $coupan->used_count) {
                    return redirect()->back()->with('error', 'Invalid or expired coupon code');
                }

                if ($coupan->type === 'fixed') {
                    $discount = $coupan->discount;
                } elseif ($coupan->type === 'percentage') {
                    $discount = ($booking->total_amount * $coupan->discount) / 100;
                }

                // Optionally: mark coupon as used
                $coupan->increment('used_count');
            }

            // Update booking with payment
            $booking->update([
                'method' => $request->method ?? 'Cash',
                'transaction_mode' => $request->transaction_mode,
                'signature' => $request->signature ?? '',
                'transaction_no' => 'TXN-' . now()->timestamp,
                'payment_status' => 1,
                'booking_status' => 'Confirmed',
                'discount_type' => $coupan->type ?? NUll,
                'coupan_code' => $$request->coupan_code ?? NUll,
                'discount' => $discount,
                'tax' => $totalTax,
                'final_amount' => $booking->total_amount -  $discount - $totalTax,
            ]);

            // Save billing info
            \App\Models\Billing::create([
                'booking_id' => $booking->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
            ]);

            DB::commit();

            return redirect()->route('website.profile')->with('success', 'Booking completed successfully.');

            return redirect()->route('booking.payment', $booking->order_id)->with('success', 'Booking completed successfully.');

            return response()->json([
                'success' => true,
                'message' => 'Booking completed successfully.',
                'invoice_no' => $booking->invoice_no,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Booking confirmation failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }





    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
