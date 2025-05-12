<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $fillable = ['type', 'user_id', 'title', 'message', 'token', 'status', 'file', 'park_id'];
}
