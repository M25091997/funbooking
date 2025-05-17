<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id', 'invoice_no', 'order_id', 'park_id', 'park_details', 'booking_date', 'total_amount', 'discount_type', 'coupan_code', 'discount', 'tax', 'final_amount', 'transaction_no', 'method', 'transaction_mode', 'signature', 'payment_status', 'booking_status'];

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetails::class);
    }

    public function park()
    {
        return $this->belongsTo(Park::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
