<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Park extends Model
{
    use HasFactory;
    protected $table = 'parks';

    protected $fillable = ['name', 'slug', 'category_id', 'address', 'area_id', 'state', 'district', 'opening_time', 'closing_time', 'location', 'booking_threshold', 'attraction', 'closing_days', 'images', 'user_id', 'social_links', 'is_active', 'status', 'helpline'];


    public static function generateUniqueSlug($name, $id = null)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public function ticketPrices()
    {
        return $this->hasMany(TicketPrice::class);
    }

    public function parkImage()
    {
        return $this->hasMany(ParkImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->where('status', true);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function isFavorited()
    {
        return $this->hasOne(Favorite::class)->where('user_id', auth()->id())->exists();
    }
}
