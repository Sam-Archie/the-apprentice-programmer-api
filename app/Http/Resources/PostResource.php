<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "user_name" => $this->user->username,
            "likes" => $this->likes,
            "updated_at" => $this->lastUpdated(),
            "image_name" => $this->image_name,
            "image_path" => $this->image_path
        ];
    }
}
