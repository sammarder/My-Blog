<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Model\Photo;

class PhotoController extends Controller
{
    public function showPage(Request $request) {
        $imageNum = $this->getImageIndex($this->resolveRequest($request));
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
        if ($num < 1) {
            return $max;
        }
        else if ($num > $max) {
            return 1;
        }
        return $num;
    }

    private function resolveRequest($request){
        $imageNum = 1;
        if ($request->input("imageNum") !== null) {
            return $request->input("imageNum");
        }
        if ($request->input("left") !== null){
            return $imageNum - 1;
        }
        if ($request->input("right") !== null){
            return $imageNum + 1;
        }
        return $imageNum;
    }
}
