<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Request;
use App\Model\Link;
use App\Model\Music;

class HomeController extends Controller
{
    /**
     * Get information for the home page
     *
     * @param App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function showHome(Request $request) {
       $name = $this->getName($request);

       $links = Link::where("owner", "=", $name)
            ->get()
            ->map(function($link) {
                return $this->cleanLinks($link);
            });

        $imageRequest = $this->resolveImage($request);
        $image = $this->getImage($imageRequest);

        $trackRequest = $this->resolveTrack($request->input("trackNum"));
        $track = $this->getTrack($trackRequest);

        return view('welcome')
            ->with(['name' => $name,
            'links' => $links,
            'image' => $image, //This will resolve to img/<pic>
            'track' => $track,
            'trackNum' => $trackRequest,
            'imageNum' => $imageRequest,]);
//       print_r("Something <br> Beatles <br><br>");
//       print_r("<p>Long live Rock!</p><p>Jack Black</p>");
    }

    private function getImage($imageNumber) {
        $imageNumber = (int)$imageNumber;
        $files = glob("img/*small.jpg");
        if ($files) {
            return $files[$imageNumber];
        }
    }

    private function resolveImage($request) {
        $imageRequest = 0;
        if ($request->input("imageNum")){
            $imageRequest = $request->input("imageNum");
        }

        if ($request->input("left")){
            $imageRequest = $imageRequest - 1;
        }
        elseif ($request->input("right")){
            $imageRequest = $imageRequest + 1;
        }
        $maxImage = 0;
        $files = glob("img/*small.jpg");
        if ($files) {
            $maxImage = count($files);
        }

        if ($imageRequest < 0) {
            return $maxImage - 1;
        }
        else if ($imageRequest == $maxImage) {
            return 0;
        }
        return $imageRequest;
    }

    private function resolveTrack($trackNum) {
        $max = Music::count();
        if (!isset($trackNum)) {
            $trackNum = 1;
        }
        if ($trackNum === "0") {
            $trackNum = $max;
        }
        if ($trackNum > $max) {
            $trackNum = 1;
        }
        if ($trackNum < 1) {
            $trackNum = $max;
        }
        return $trackNum;
    }

    private function getTrack($trackNum) {
        return Music::where("id", "=", $trackNum)->get()[0];
    }

    private function cleanLinks($link){
        $rlink = $link;
        if (strpos($link->link, "http") === FALSE) {
            $rlink->link = route($link->link);
        }
        return $rlink;
    }

    private function getName($request){
        $name = "Sam";
        if ($request->input("name")) {
            $names = explode(" ", $request->input("name"));
            $names = array_map(function($n){return ucfirst($n);}, $names);
            $name = implode(" ", $names);
        }
        return $name;
    }
}
