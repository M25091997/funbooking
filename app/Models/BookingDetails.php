<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingDetails extends Model
{
    protected $fillable = ['booking_id', 'ticket_type_id', 'quantity', 'price', 'mrp', 'types'];

    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }
}
