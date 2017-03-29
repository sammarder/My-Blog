<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Model\Photo;

class PhotoController extends Controller
{
    public function showDetail(Request $request, $season, $id = 0){
    }

    public function showLanding(Request $request) {
        $photos = Photo::get();
        $index = 0;
        foreach($photos as $p){
            $p->index = $index;
            $index = $index + 1;
        }
        $rows = $photos->chunk(4);
        return view('landing')->with(
            ["rows" => $rows,]);
    }

    public function showPage(Request $request) {
        $imageNum = $this->getImageIndex($this->resolveRequest($request));
        $photo = Photo::where("id", "=", $imageNum)->get()[0];
	return view('photo')->with(
            ["imageNum" => $imageNum,
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
