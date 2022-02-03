<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::with(['category', 'tags'])->paginate());
    }

    public function show(Post $post)
    {
        $thisPost = Post::where('id', $post->id)->whit('category', 'tags')->first();

        return new PostResource($thisPost);
    }
}
