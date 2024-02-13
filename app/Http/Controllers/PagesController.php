<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage(){
        $blogs = Blog::all();
        $largestid = Blog::max("id");
        $largeblog = Blog::find($largestid);
        return view('homepage', compact('blogs', 'largeblog'));
    }

    public function adminpage(){
        $blogs = Blog::all();
        $comments = Comment::all();
        return view('admin/adminpanel', compact('blogs', 'comments'));
    }

    public function findpage(string $id){
        $blogs = Blog::all();
        $selected_blog = Blog::find($id);
        return view('homepage', compact('selected_blog', 'blogs'));
    }
}
