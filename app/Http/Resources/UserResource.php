<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "user_id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "full_name" => $this->fullName(),
            "user_name" => $this->user_name,
            "email" => $this->email,
            "member_since" => $this->memberSince(),
            "is_administrator" => $this->isAdmin,
            "last_updated" => $this->lastUpdated()
        ];
    }
}
