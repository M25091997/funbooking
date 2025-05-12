<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['user_id', 'category_id', 'park_id', 'role', 'name', 'email', 'mobile', 'aadhaar_no', 'address', 'remarks', 'document', 'photo', 'is_active'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
