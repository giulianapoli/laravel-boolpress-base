<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        $category = Category::all();

        return view('create', compact('tags', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'title' => 'required | string | min: 3',
            'author' => 'required | string | min: 3',
        ]);

        $newpost = Post::create([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'categories' => $data['categories'],
        ]);

        $newpost->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = Post::find($id);

        $tags = $details->tags;

        $category = $details->post;

        $info = $details->postInformation;

        return view('details', compact('details', 'tags', 'category', 'info'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $details = Post::find($id);

        $tags = Tag::all();

        $category = Category::all();

        return view('edit', compact('details', 'tags', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $data = $request::all();

        $post->tags()->detach();
        $post->update($data);

        $post->hasInfo->update($data);
        foreach ($data["tags"] as $tag) {
            $post->tags()->attach($tag);
        }

        return redirect()->route('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->hasInfo->delete();

        foreach ($post->tags as $tag) {
            $post->tags()->detach($tag->id);
        }

        $postt->delete();

        return redirect()->back();
    }
}
