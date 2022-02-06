<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CreatepostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->orderByDesc('id')->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|unique:posts',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:500',
            'body' => 'nullable'
        ]);

        if ($request->file('image')) {
            $image = Storage::put('post_images', $request->file('image'));
            //oppure
            // $image = $request->file('image')->store('post_image');
            $validate['image'] = $image;
        }

        $validate['slug'] = Str::slug($validate['title']);

        $validate['user_id'] = Auth::id();

        $post = Post::create($validate);
        if ($request->has('tags')) {
            $request->validate([
                'tags' => 'nullable|exists:tags,id'
            ]);
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index')->with('message', "Hai creato un nuovo post con successo.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        $tags = Tag::all();

        if (Auth::id() === $post->user_id) {
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::id() === $post->user_id) {
            $validate = $request->validate([
                'title' => [
                    'required',
                    Rule::unique('posts')->ignore($post->id)
                ],
                'category_id' => 'nullable|exists:categories,id',
                'image' => 'nullable|image|max:500',
                'body' => 'nullable'
            ]);

            if ($request->file('image')) {
                Storage::delete($post->image);
                $image = Storage::put('post_images', $request->file('image'));
                //oppure
                // $image = $request->file('image')->store('post_image');
                $validate['image'] = $image;
            }

            $validate['slug'] = Str::slug($validate['title']);

            $post->update($validate);

            if ($request->has('tags')) {
                $request->validate([
                    'tags' => 'nullable|exists:tags,id'
                ]);
                $post->tags()->sync($request->tags);
            }

            return redirect()->route('admin.posts.index')->with('message', "Hai modificato il post $post->title correttamente.");
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::id() === $post->user_id) {
            Storage::delete($post->image);
            $post->delete();

            return redirect()->route('admin.posts.index')->with('message', "Hai cancellato il post $post->title correttamente.");
        } else {
            abort(403);
        }
    }
}
