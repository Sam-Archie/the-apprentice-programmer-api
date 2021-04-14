<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostSearchResource;

class PostController extends Controller
{

    public $postModel;

    public function __construct()
    {   
        $this->postModel = new Post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();

        $post = Post::create($data);

        return new PostResource($post);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Comment $comment)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();

        $post->update($data);

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response(null, 204);
    }

    public function searchPostTitle(...$title)
    {
        if(count($title) && preg_match("/S\S/", urldecode($title[0]))) {
            $posts = Post::where("title", "like", "%".$title[0]."%")->get();
            return PostSearchResource::collection($posts);
        } else {
            return PostSearchResource::collection([]);
        }
    }
    
}
