<?php

namespace App\Http\Resources;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
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
        $user = User::find($this->user_id);
        return [
            "post" => [
            "post_id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "user_name" => $user->user_name,
            "likes" => $this->likes,
            "updated_at" => $this->lastUpdated(),
            "image_name" => $this->image_name,
            "image_path" => $this->image_path,
            "comments" => CommentResource::collection($this->comments),
            "tags" => $this->tags->pluck("tag"),
            ],
        ];
    }
}
