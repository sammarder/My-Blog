<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Model\Photo;

class PhotoController extends Controller
{
    public function showPage(Request $request) {
        $imageNum = 1;
        if ($request->input("imageNum") !== null) {
            $imageNum = $request->input("imageNum");
        }
        if ($request->input("left") !== null){
            $imageNum = $imageNum - 1;
        }
        if ($request->input("right") !== null){
            $imageNum = $imageNum + 1;
        }
        $imageNum = $this->getImageIndex($imageNum);
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
        $num = (int)$num;
        if ($num < 1) {
            return $max;
        }
        else if ($num > $max) {
            return 1;
        }
        return $num;
    }
}
