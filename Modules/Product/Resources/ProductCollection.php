<?php

namespace Modules\Product\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Product\Models\Product;

class ProductCollection extends ResourceCollection
{
    
    public $collects = ProductIndexResource::class;
    
    /**
     * Transform the resource collection into an array.
     */
    public function toArray($request) : array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
