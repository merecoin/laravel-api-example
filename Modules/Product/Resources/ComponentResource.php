<?php

namespace Modules\Product\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComponentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request) : array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'isHot' => $this->is_hot,
        ];
    }
}
