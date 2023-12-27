<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::paginate(10);
        return view('posts', ['posts' => $posts, 'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {
        $user = Auth::user();
        $post = new Post($request->validated());
        $post = $user->posts()->save($post);
        $post->tags()->sync($request->validated('tags'));
        return redirect()->route('posts.listPost');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if (!$post) return redirect('/post/list');
        $user = Auth::user();
        return view('posts', ['post' => $post, 'user'=>$user, 'isAdmin'=>$user->role_id === 2]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.list')->with('success', "Article '" . $post->title . "' supprimé avec succès");
    }
}
