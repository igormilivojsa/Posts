<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('home', compact('posts'));
    }

    public function create()
    {
        return view('home');
    }


    public function store(PostRequest $request)
    {
        Post::create($request->validated());

        return back();
    }


    public function show(Post $post)
    {
        return view('posts.post', compact('post'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
