<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProductFactory;
use Modules\Tag\Models\Tag;
use Modules\Category\Models\Category;
use Modules\Image\Models\Image;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Отношения, которые всегда должны быть загружены.
     */
    protected $with = ['components','tags','images','category'];

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    public function components()
    {
        return $this->belongsToMany(Component::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class)->withPivot('is_default');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
