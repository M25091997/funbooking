<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'otp',
        'profile_image',
        'avatar',
        'role_id',
        'role',
        'referral_code',
        'referred_by',
        'status',
        'is_verify'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function park()
    {
        return $this->hasMany(Park::class);
    }

    public static function generateReferralCode()
    {
        do {
            $code = strtoupper(Str::random(5));
        } while (User::where('referral_code', $code)->exists());

        return $code;
    }

    public function customerWallet()
    {
        return $this->belongsTo(CustomerWallet::class);
    }
}
