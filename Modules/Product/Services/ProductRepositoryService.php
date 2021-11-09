<?php

namespace Modules\Product\Services;

use Modules\Product\Models\Product;
use Illuminate\Support\Collection;

class ProductRepositoryService
{

    /**
     * Return collection of Products
     */
    public function getProducts(Collection $categories, int $paginateLimit)
    {
        $query = Product::query();
        if ($categories) {
            return $query
                ->whereIn('category_id', $categories)
                ->paginate($paginateLimit);
        }
    }
}
