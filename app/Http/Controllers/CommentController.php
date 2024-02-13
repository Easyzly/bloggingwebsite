<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, int $id){
        $blog = Blog::find($id);
        Comment::create([
            'blog_id' => $blog->id,
            'content' => $request->input('content'),
        ]);

        return redirect()->route('page.find', $blog->id);
    }

    public function destroy(int $id){
        $comment = Comment::find($id);
        if($comment) {
            $comment->delete();
        }
        return redirect()->route('page.admin');
    }
}
