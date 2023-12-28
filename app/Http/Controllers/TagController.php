<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagFormRequest;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tag.listTags', compact('tags'));
    }

    /**
     * Display the form for create a tag.
     */
    public function create()
    {
        return view('tag.formTag');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagFormRequest $request)
    {
        Tag::create($request->validated());
        return redirect()->route('tags.listTags')->with('success', 'Tag créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.detailsTag', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagFormRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->validated());
        return redirect()->route('tags.listTags')->with('success', 'Tag mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('tags.listTags')->with('success', 'Tag supprimé avec succès.');
    }
}
