<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Model\Photo;

class PhotoController extends Controller
{
    public function showDetail(Request $request, $season, $id){
        $pic;
        $prev = -1;
        $first = -1;
        $last = -1;
        $next = -1;
        $max = -1;
        if ($id != 0){
            $prev = $id - 1;
            $first = 0;
        }
        if (strcmp($season, "all") == 0) {
           $photos = Photo::get();
           $max = count($photos) - 1;
           $pic = $photos[$id];
        }
        else {
           $photos = Photo::whereRaw("concat(season,year) = '$season'")->get();
           $max = count($photos) - 1;
           $pic = $photos[$id];
        }
        if ($id != $max) {
            $last = $max;
            $next = $id + 1;
        }
        return view('detail')->with(["pic" => $pic,
            "id" => $id,
            "prev" => $prev,
            "first" => $first,
            "next" => $next,
            "last" => $last,
            "season" => $season,]);
    }

    public function showFolders(Request $request){
        $s = Photo::selectRaw("concat(season, year) as value, concat(season, ' ', year) as display")->distinct()->get();
        $sorted = $this->sortSeasons($s);
        $seasons = $sorted->chunk(5);
        return view('folders')->with(
            ["seasons" => $seasons,]);
    }

    public function showThumbnails(Request $request, $season) {
        $t = Photo::whereRaw("concat(season,year) = '$season'")->get();
        $id = 0;
        foreach($t as $item) {
            $item['index'] = $id;
            $id = $id + 1;
        }
        $thumbnails = $t->chunk(5);
        return view('thumbnails')->with(
            ["thumbnails" => $thumbnails,
            "season" => $season,]);
    }

    private function sortSeasons($seasons) {
        foreach($seasons as $season) {
            $s = explode(" ", $season['display']);
            $date = "";
            if ($s[0] === "Fall"){
                $date = "September ";
            }
            elseif ($s[0] === "Winter") {
                $date = "January";
            }
            elseif ($s[0] === "Spring") {
                $date = "April";
            }
            elseif ($s[0] === "Summer") {
                $date = "July";
            }
            $season['date'] = date_parse($date.$s[1]);
        }
        return $seasons->sortBy('date');
    }
}
