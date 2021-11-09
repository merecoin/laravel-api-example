<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Cart\Models\Cart;
use Modules\User\Models\Profile;
use Database\Factories\UserFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected static function newFactory()
    {
        return UserFactory::new();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'unverified_phone',
        'email',
        'plain_bearer_token',
    ];

    protected $with = [
        'profile',
        'cart',
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
