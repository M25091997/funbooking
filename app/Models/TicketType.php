<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $fillable = ['name', 'rules', 'is_active', 'user_id', 'category_id'];
}
