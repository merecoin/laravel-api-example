<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;
use Database\Factories\ProfileFactory;

class Profile extends Model
{
    use HasFactory;

    protected $casts = [
        'subscribed' => 'boolean',
    ];

    protected static function newFactory()
    {
        return ProfileFactory::new();
    }

    protected $fillable = [
        'name',
        'used_addresses',
        'subscribed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
