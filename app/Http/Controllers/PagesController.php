<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Media;
use App\Models\Project;
use App\Models\Comment;
use App\Models\User;
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

    public function create(){
        $blogs = Blog::all();
        $projects = Project::all();
        $media = Media::all();
        return view('admin/create', compact('media','projects','blogs'));
    }

    public function destroy(){
        $blogs = Blog::all();
        $projects = Project::all();
        $media = Media::all();
        return view('admin/destroy', compact('media','projects','blogs'));
    }

    public function show($id)
    {
        // Retrieve the media item by ID
        $media = Media::findOrFail($id);

        // Pass the media item to the view
        return view('show', compact('media'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin/users', compact('users'));
    }
}
