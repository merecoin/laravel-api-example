<?php

namespace Modules\User\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->profile->name,
            'phone' => $this->phone,
            'unverifiedPhone' => $this->unverified_phone,
            'email' => $this->email,
            'subscribed' => $this->profile->subscribed,
            'usedAddresses' => $this->profile->used_addresses,
        ];
    }
}
