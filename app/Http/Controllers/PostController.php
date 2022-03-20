<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create([...$request->validated(), 'user_id' => 1]);

        return to_route('posts.index')->with('success', 'Post iss successfully saved');
    }

    public function show(Post $post) {

    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return to_route('posts.index')->with('success', 'Post is successfully saved');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')->with('success', 'Post is successfully deleted');
    }
}
