<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = User::find($this->user_id);
        
        return [
            "id" => $this->id, 
            "content" => $this->content,
            "user_name" => $user->user_name,
            "likes" => $this->likes,
        ];
    }
}
