<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountType extends Model
{
    protected $fillable = ['category_id', 'name', 'user_id', 'is_active'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
