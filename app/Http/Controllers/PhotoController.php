<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Model\Photo;

class PhotoController extends Controller
{
    public function showPage(Request $request) {
        $imageNum = ($request->input("imageNum") ? $request->input("imageNum"): 1);
        $max = Photo::count();
        $photo = Photo::where("id", "=", $imageNum)->get()[0];
	$elements = explode("/", $photo->filename);
        $name = end($elements);
        return view('photo')->with(
            ["name" =>  $name,
            "imageNum" => $imageNum,
            "photo" => $photo,]);
    }
}
