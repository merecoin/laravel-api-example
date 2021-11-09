<?php

namespace Modules\Tag\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\TagFactory;
use Modules\Product\Models\Product;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return TagFactory::new();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
