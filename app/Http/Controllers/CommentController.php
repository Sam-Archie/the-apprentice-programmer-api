<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Post $post)
    {
        $data = $request->all();

        $comment = new Comment($data);

        $comment->article()->associate($post);

        $post->save();

        return new CommentResource($comment);
    }

    public function update(CommentRequest $request, Post $post, Comment $comment)
    {
        $data = $request->all();

        $comment->update($data);

        return new CommentResource($comment);
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response(null, 204);
    }
}
