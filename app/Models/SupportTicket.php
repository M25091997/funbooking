<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    protected $fillable = ['user_id', 'support_type_id', 'park_id', 'subject', 'message', 'status', 'file'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function supportType()
    {
        return $this->belongsTo(SupportType::class);
    }
}
