<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Request;
use App\Model\Link;
use App\Model\Music;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {}

   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //return view('home');
    }

    /**
     * Get information for the home page
     *
     * @param App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function showName(Request $request) {
        $name = "Sam";
        if ($request->input("name")) {
            $names = explode(" ", $request->input("name"));
            $names = array_map(function($n){return ucfirst($n);}, $names);
            $name = implode(" ", $names);
        }
        $links = Link::where("owner", "=", $name)
            ->get()
            ->map(function($link) {
                return $this->cleanLinks($link);
            });
        $auto = "";
        $imageRequest = 0;
        if ($request->input("imageNum") !== null){
            $imageRequest = $request->input("imageNum");
        }
        if ($request->input("left") !== null){
            $imageRequest = $imageRequest - 1;
        }
        if ($request->input("right") !== null){
            $imageRequest = $imageRequest + 1;
        }
        $imageRequest = $this->resolveImage($imageRequest);
        $image = $this->getImage($imageRequest);
        $trackRequest = $request->input("trackNum");
        $trackRequest = $this->resolveTrack($request->input("trackNum"));
        $track = $this->getTrack($trackRequest);
        
        if ((null === $request->input("imageNum")) && (null !== $request->input("trackNum"))) {
            $auto = "autoplay";
        }
        //EXIF: Model, ExposureTime, FocalLength, COMPUTED ApertureFNumber, and ISOSpeedRatings
        //$exifInfo = exif_read_data("/home/pi/blog/public/img/germany.jpg");
        //print_r(getcwd()); //var/www/html/
        return view('welcome')
            ->with(['name' => $name,
            'links' => $links,
            'image' => $image, //This will resolve to img/<pic>
            'track' => $track,
            'trackNum' => $trackRequest,
            'imageNum' => $imageRequest,
            'auto' => $auto,]);
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

    private function resolveImage($imageNumber) {
        $maxImage = 0;
        $imageNumber = (int)$imageNumber;
        $files = glob("img/*small.jpg");
        if ($files) {
            $maxImage = count($files);
        }
        if ($imageNumber < 0) {
            $imageNumber = $maxImage - 1;
        }
        else if ($imageNumber == $maxImage) {
            $imageNumber = 0;
        }
        return $imageNumber;
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
}
