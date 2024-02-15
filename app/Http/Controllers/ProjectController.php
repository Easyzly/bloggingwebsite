<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Project::create([
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            'date' => $request->input('date'),
            'imagepath' => $imageName,
        ]);

        return redirect()->route('page.project');
    }

    public function destroy(int $id){
        $project = Project::find($id);
        if($project) {
            $project->delete();
        }
        return redirect()->route('page.destroy');
    }
}
