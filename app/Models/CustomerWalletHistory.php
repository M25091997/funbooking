<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerWalletHistory extends Model
{
    protected $fillable = ['wallet_id', 'user_id', 'type', 'amount', 'park_id', 'transaction_id', 'remarks'];
}
