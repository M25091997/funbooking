<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function benefits()
    {
        return $this->belongsTo(SubscriptionBenefit::class)->where('is_active', true);
    }
}
