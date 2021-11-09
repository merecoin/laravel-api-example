<?php

namespace Modules\Product\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Tag\Resources\TagResource;
use Modules\Image\Resources\ImageProductResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request) : array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'oldPrice' => $this->old_price,
            'currency' => $this->currency,
            'categoryId' => $this->category_id,
            'categoryName' => $this->category->name,
            'nutritionalValue' => $this->nutritional_value,
            'components' => ComponentResource::collection($this->whenLoaded('components')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'images' => ImageProductResource::collection($this->whenLoaded('images')),
        ];
    }
}
