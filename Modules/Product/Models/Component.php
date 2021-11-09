<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ComponentFactory;

class Component extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return ComponentFactory::new();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
