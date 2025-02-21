<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use app\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::all());
    }
    public function getPostByCategoryId($category_id)
    {
        $category = Category::find($category_id);
        if($category) {
            return response()->json([
                'data' => $category->posts,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Category not found',
                'success' => false
            ],404);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer'
        ]);
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::find($id);
        if($post){
            return response()->json([
                'data' => $post,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Post not found',
                'success' => false
            ],404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = Post::find($id);
        if($post){
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'category_id' => 'required|integer'
            ]);
            $post->update($request->all());
            return response()->json([
                'data' => $post,
                'success' => true
            ],200);
        }else{
            return response()->json([
                'message' => 'Post not found',
                'success' => false
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $post)
    {
        //
        $post = Post::find($post);
        if($post){
            $post->delete();
            return response()->json([
                'data' => $post,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Post not found',
                'success' => false
            ],404);
        }
    }
}
