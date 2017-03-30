<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Model\Photo;

class PhotoController extends Controller
{
    public function showDetail(Request $request, $season, $id){
        //This is confirmed to get the proper pic in happy path
        //TODO: cover the case where the query returns nothing
        $pic;
        if (strcmp($season, "all") == 0) {
           $pic = Photo::get()[$id];
        }
        else {
           $pic = Photo::whereRaw("concat(season,year) = '$season'")->get()[$id];
        }
        print_r($pic);
        //return view('detail')->with(['pic' => $pic]);
    }

    public function showLanding(Request $request) {
        $season = "all";
        if ($request->input('season')){
            $season = $request->input('season');
        }
        $photos;
        if ($season == "all") {
            $photos = Photo::get();
        }
        else {
            $photos = Photo::whereRaw("concat(season,year) = '$season'")->get();
        }
        $index = 0;
        foreach($photos as $p){
            $p->index = $index;
            $index = $index + 1;
        }
        $rows = $photos->chunk(4);
        $seasons = Photo::selectRaw("concat(season, year) as value, concat(season, ' ', year) as display")->distinct()->get();
        return view('landing')->with(
            ["rows" => $rows,
            "seasons" => $seasons,
            "current" => $season,]);
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
