<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerWallet extends Model
{
    protected $fillable = ['user_id', 'balance', 'is_active'];
}
