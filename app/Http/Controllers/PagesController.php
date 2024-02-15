<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Media;
use App\Models\Project;
use App\Models\Comment;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage(){
        $latestblog = Blog::latest("date")->first();
        return view('homepage', compact('latestblog'));
    }

    public function blogs(){
        $blogs = Blog::all()->sortByDesc('date');
        return view('blog', compact('blogs'));
    }

    public function projects(){
        $projects = Project::all();
        return view('project', compact('projects'));
    }

    public function media(){
        $media = Media::all();
        return view('media', compact('media'));
    }

    public function dashboard(){
        $blogs = Blog::all();
        $projects = Project::all();
        $media = Media::all();
        return view('dashboard', compact('media','projects','blogs'));
    }
}
