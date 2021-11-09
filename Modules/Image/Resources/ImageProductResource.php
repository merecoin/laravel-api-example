<?php

namespace Modules\Image\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request) : array
    {
        return [
            'url' => $this->url,
            'isDefault' => $this->whenPivotLoaded('image_product', function () {
                return $this->pivot->is_default;
            }),
        ];
    }
}
