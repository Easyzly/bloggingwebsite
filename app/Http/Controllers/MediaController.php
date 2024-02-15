<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Media::create([
            'imagepath' => $imageName,
        ]);

        return redirect()->route('page.media');

    }

    public function destroy(int $id)
    {
        $item = Media::findorfail($id);
        $image_path = public_path("/images/".$item->imagepath);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $item->delete();
        return redirect()->route('page.destroy');
    }
}
