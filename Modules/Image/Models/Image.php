<?php

namespace Modules\Image\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ImageFactory;
use Modules\Product\Models\Product;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return ImageFactory::new();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('is_default');
    }
}
