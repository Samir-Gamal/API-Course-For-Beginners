<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use http\Env\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::get();
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(StorePostRequest $request)
    {
        try {
            Post::create($request->all());
            return redirect()->back()->with('success', 'Data saved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(Post $post)
    {
        //
    }


    public function edit($id)
    {
        $post = Post::findorFail($id);
        return view('posts.edit', compact('post'));
    }


    public function update(StorePostRequest $request, $id)
    {

        try {
            $post = Post::findorFail($id);

            $post->update($request->all());

            return redirect()->back()->with('edit', 'Data Updated successfully');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function destroy($id)
    {
        try {

            Post::destroy($id);
            return redirect()->back()->with('delete', 'Data has been deleted successfully');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
