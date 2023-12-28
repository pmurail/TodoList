<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.listPosts', compact('posts'));
    }

    /**
     * Display the form for create a post.
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.formPost', compact('users', 'categories', 'tags'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {
        Post::create($request->validated());
        return redirect()->route('posts.listPosts')->with('success', 'Article créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('tag.detailsTag', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validated());
        return redirect()->route('posts.listPosts')->with('success', 'Article mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Article supprimé avec succès.');
    }
}
