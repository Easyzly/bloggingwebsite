<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        return view('admin/blogedit', compact('blog'));
    }

    public function update(Request $request, int $id){
        $blog = Blog::find($id);
        if($blog){
            $blog->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'date' => $request->input('date')
            ]);
        }
        return redirect()->route('page.destroy');
    }

    public function destroy(int $id){
        $blog = Blog::find($id);
        $image_path = public_path("/images/".$blog->imagepath);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        if($blog) {
            $blog->delete();
        }
        return redirect()->route('page.destroy');
    }
}
