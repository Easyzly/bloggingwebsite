<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function store(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Blog::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'date' => $request->input('date'),
            'imagepath' => $imageName
        ]);

        return redirect()->route('page.blog');
    }

    public function edit(int $id){
        $blog = Blog::find($id);
        return view('admin/adminblogedit', compact('blog'));
    }

    public function update(Request $request, int $id){
        $blog = Blog::find($id);
        if($blog){
            $blog->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'creationdate' => $request->input('creationdate')
            ]);
        }
        return redirect()->route('page.admin');
    }

    public function destroy(int $id){
        $blog = Blog::find($id);
        if($blog) {
            $blog->delete();
        }
        return redirect()->route('dashboard');
    }
}
