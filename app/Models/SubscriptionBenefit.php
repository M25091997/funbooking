<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionBenefit extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function park()
    {
        return $this->belongsTo(Park::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
