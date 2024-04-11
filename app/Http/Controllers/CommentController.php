<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;

class CommentController extends Controller
{
    
    public function writeComment(Request $request, $blogId)
    {
        // validieren des Requests
        $request->validate([
            'content' => 'required|string'
        ]);
        // ist es ein Sub/Kommentar

        // schreibe Inhalt und Blog id
        Comment::create([
            'user_id' => auth()->id(),
            'blog_id' => $blogId,
            'content' => $request->content
        ]);

        // inkrementiere Interaktion des Blogs
        $blog = Blog::findOrFail($blogId);
        $blog->IncrementInteractions($blogId);

        // Gib ein OK zurück
        return response()->json(['message' => 'Comment created successfully'], 201);
    }
}
