<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;

class PhotoController extends Controller
{
    //TODO: Make the imagenum and src more dynamic
    public function showPage(Request $request) {
        $imageNum = 0;
        $src = "/home/pi/blog/public/img/noms.jpg";
	$elements = explode("/", $src);
        $name = end($elements);
	$exifInfo = exif_read_data($src);
        return view('photo')->with(
            ["src" => $src,
            "name" =>  $name,
            "imageNum" => $imageNum,
            "exifInfo" => $exifInfo,]);
    }
}
