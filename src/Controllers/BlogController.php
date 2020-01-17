<?php

namespace Magros\PackageWorkshop\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Magros\PackageWorkshop\Models\PackagePost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = PackagePost::all();

        return view('workshop::index', compact('posts'));
    }

    public function create()
    {
        $post = new PackagePost();

        return view('workshop::save', compact('post'));
    }

    public function store(Request $request)
    {
        PackagePost::create($request->all());
    }

    public function edit(Request $request, $postId)
    {
        $post = PackagePost::findOrFail($postId);
        return view('workshop::save', compact('post'));
    }

    public function update($postId, Request $request)
    {
        $post = PackagePost::findOrFail($postId);

        $post->update($request->all());

    }


    public function destroy($postId, Request $request)
    {
        $post = PackagePost::findOrFail($postId);
        $post->delete();
    }

}