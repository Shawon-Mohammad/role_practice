<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();
        if($request->has('search') ){
            $posts = Post::where('title','like','%'.$request->search)
            ->orWhere('body','like','%'.$request->search)
            ->orWhere('Status','like','%'.$request->search)
            ->get();
        }
        return view('posts.index', compact('posts'));

    }
    public function create()
    {
        $this->authorize('add_post');
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
                'user_id' => auth()->id()
            ]);
            return to_route('posts.index')->with('success', 'The Post Successfully Created');
        } catch (Exception $e) {
            return to_route('posts.index')->with('error', $e->getMessage());
        }
    }
    function edit($data)
    {
        $this->authorize('edit_post');

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
        $this->authorize('delete_post');
        try {
            Post::findOrFail($data)->delete();
            return to_route('posts.index')->with('success', 'The Post Successfully deleted');
        } catch (Exception $e) {
            return to_route('posts.index')->with('error', $e->getMessage());
        }
    }

    public function show(Post $post)
    {
        $this->authorize('view_post');

        return view("posts.show", compact('post'));
    }
}
