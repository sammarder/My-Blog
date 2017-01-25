<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;

class PhotoController extends Controller
{
    //TODO: I want ApertureFNumber, Model, and lens but that last one may be difficult
    public function showPage(Request $request) {
        $imageNum = 0;
        $src = "/home/pi/blog/public/img/fall.jpg";
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
