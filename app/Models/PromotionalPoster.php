<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionalPoster extends Model
{
    protected $fillable = ['title', 'image', 'btn_txt', 'link', 'is_active', 'user_id'];
}
