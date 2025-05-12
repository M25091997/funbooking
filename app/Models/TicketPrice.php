<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketPrice extends Model
{
    protected $fillable = ['category_id', 'park_id', 'ticket_type_id', 'mrp', 'price', 'is_active'];

    public function park()
    {
        return $this->belongsTo(Park::class);
    }
}
