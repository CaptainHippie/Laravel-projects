<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function gallery()
    {
        $img_all = Image::all();
        return view ('img.gallery')->with('all_images', $img_all);;
    }
    public function upload(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName = $request->file('photo')->getClientOriginalName();
        $yes = $request->photo->move(public_path('images'), $fileName);

        if($yes){
            $im = new Image();
            $im->img_name = $fileName;
            $im->save();
            return back()->with('success','Image uploaded successfully');
        }else{
            return back()->with('fail','Image upload failed');
        }
    }
}
