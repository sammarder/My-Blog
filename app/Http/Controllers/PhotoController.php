<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;

class PhotoController extends Controller
{
    //TODO: I want ApertureFNumber, Model, and lens but that last one may be difficult
    public function showPage(Request $request) {
        $src = "/home/pi/blog/public/img/germany.jpg";
	$exifInfo = exif_read_data($src);
        return view('photo')->with(
            ["src" => $src,
            "name" => "germany.jpg",
            "imageNum" => 0,
            "exifInfo" => $exifInfo,]);
    }
}
