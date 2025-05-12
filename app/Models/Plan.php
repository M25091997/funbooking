<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function benefits()
    {
        return $this->hasMany(SubscriptionBenefit::class)->where('is_active', true);
    }
}
