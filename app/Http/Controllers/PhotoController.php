<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Model\Photo;

class PhotoController extends Controller
{
    //TODO: Make the imagenum and src more dynamic
    public function showPage(Request $request) {
        $imageNum = ($request->input("imageNum")? $request->input("imageNum"): 1);
        $max = Photo::count();
        $photo = Photo::where("id", "=", $imageNum)->get()[0];
        $src = "/home/pi/blog/public/".$photo->filename;
	$elements = explode("/", $src);
        $name = end($elements);
	//$exifInfo = exif_read_data($src);
        return view('photo')->with(
            ["src" => $src,
            "name" =>  $name,
            "imageNum" => $imageNum,
            "photo" => $photo,]);
    }
}
