<?php

namespace App\Http\Controllers;

use App\Models\PostTag;
use Illuminate\Http\Request;
use app\Models\Post;
use app\Models\Tag;
class PostTagController extends Controller
{
    public function getPostsByTagId($tag_id)
    {
        $postTag = Post::with('posts')->find($tag_id);
        if($postTag) {
            return response()->json([
                'data' => $postTag->posts,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Tag not found',
                'success' => false
            ],404);
        }
    }
    public function getTagsByPostId($post_id)
    {
        $postTag = Tag::with('tags')->find($post_id);
        if($postTag) {
            return response()->json([
                'data' => $postTag->tags,
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
