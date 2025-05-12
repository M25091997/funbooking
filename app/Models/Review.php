<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'park_id', 'name', 'email', 'phone', 'image_path', 'rating', 'review', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function park()
    {
        return $this->belongsTo(Park::class);
    }
}
