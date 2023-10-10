<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'status' => 'required',

        ]);
        try {
            $post = Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'status' => $request->status,
            ]);
            return to_route('posts.index')->with('success', 'The Post Successfully Created');
        } catch (Exception $e) {
            return to_route('posts.index')->with('error', $e->getMessage());
        }
    }
    function edit($data)
    {
        $this->authorize('edit_post','delete_post');

        $post = Post::findOrFail($data);
        return view("posts.edit", compact('post'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'status' => 'required',
        ]);
        try {
            $post = Post::findOrFail($id)->update([
                'title' => $request->title,
                'body' => $request->body,
                'status' => $request->status,
                'user_id' => auth()->id()
            ]);
            if ($request->ajax()) {
                return response()->json([
                    'status' => 1,
                    'message' => 'The post is successfully updated'
                ]);
            } else {
                return to_route('posts.index')->with('success', 'The Post Successfully Updated');
            }
        } catch (Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 0,
                    'message' => $e->getMessage()
                ]);
            } else {
                return to_route('posts.index')->with('error', $e->getMessage());
            }
        }
    }

    function delete($data)
    {
        try {
            Post::findOrFail($data)->delete();
            return to_route('posts.index')->with('success', 'The Post Successfully deleted');
        } catch (Exception $e) {
            return to_route('posts.index')->with('error', $e->getMessage());
        }
    }

    public function show(Post $post)
    {

        return view("posts.show", compact('post'));
    }
}
