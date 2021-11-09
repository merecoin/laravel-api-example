<?php

namespace Modules\Cart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;
use Database\Factories\CartFactory;

class Cart extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return CartFactory::new();
    }

    protected $fillable = [
        'comment',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
