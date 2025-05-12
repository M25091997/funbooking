<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['discount_type_id', 'name', 'code', 'discount', 'type', 'valid_from', 'valid_until', 'usage_limit', 'used_count', 'park_id', 'is_active', 'user_id'];

    public function discountType()
    {
        return $this->belongsTo(DiscountType::class);
    }
}
