<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Model\Photo;

class PhotoController extends Controller
{
    public function showPage(Request $request) {
        $imageNum = $this->getImageIndex($request->input("imageNum"));
        $max = Photo::count();
        $photo = Photo::where("id", "=", $imageNum)->get()[0];
	$elements = explode("/", $photo->filename);
        $name = end($elements);
        return view('photo')->with(
            ["name" =>  $name,
            "imageNum" => $imageNum,
            "photo" => $photo,]);
    }

    private function getImageIndex($num) {
        $max = Photo::count();
        if (!isset($num)) {
            return 1;
        }
        if ($num === "0") {
            return $max;
        }
        $num = (int)$num;
        if ($num < 1) {
            return $max;
        }
        else if ($num > $max) {
            return 1;
        }
        else {
            return $num;
        }
    }
}
