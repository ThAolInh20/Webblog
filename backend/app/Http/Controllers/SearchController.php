<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use app\Models\Category;

class SearchController extends Controller
{
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
}
