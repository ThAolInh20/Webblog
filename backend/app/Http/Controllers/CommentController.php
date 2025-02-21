<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'post_id' => 'required|integer',
            'account_id' => 'required|integer'
        ]);
        $comment = Comment::create($request->all());
        return response()->json($comment, 201);
    }
    //
    public function getCommentByPostId($post_id)
    {
        $post = Post::find($post_id);
        if($post){
            return response()->json([
                'data' => $post->comments,
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
