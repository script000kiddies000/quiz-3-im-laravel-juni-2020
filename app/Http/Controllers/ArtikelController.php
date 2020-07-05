<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'tag' => 'nullable',
        ]);

        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->title   = request('title');
        $post->slug    = Str::slug(request('slug'));
        $post->content = request('content');
        $post->tag     = request('tag');
        $post->save();

        session()->flash('successMessage', 'Artikel telah tersimpan');
        return redirect('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($postId)
    {
        $post = Post::find($postId);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        $post = Post::find($postId);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postId)
    {
        $post = Post::find($postId);

        request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'tag' => 'nullable',
        ]);

        $post->title   = request('title');
        $post->slug    = Str::slug(request('slug'));
        $post->content = request('content');
        $post->tag     = request('tag');
        $post->save();

        session()->flash('successMessage', 'Artikel telah diperbarui');
        return redirect('artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();

        session()->flash('successMessage', 'Artikel telah dihapus');
        return redirect()->back();
    }
}
