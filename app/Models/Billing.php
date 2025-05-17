<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = ['booking_id', 'name', 'email', 'phone', 'address', 'city', 'state', 'postal_code', 'country'];
}
