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

    public function showName(Request $request) {
        $name = "Laravel";
        if ($request->input("name")) {
            $names = explode(" ", $request->input("name"));
            for( $i = 0; $i < count($names); $i++) {
                $names[$i] = ucfirst($names[$i]);
            }
            $name = implode(" ", $names);
        }
        $query = Link::where("owner", "=", $name);
        $links = $query->get();
        $imageRequest = ($request->input("imageNum") ? $request->input("imageNum") : 0);
        $image = $this->getImage($imageRequest);
        $imageRequest = $this->resolveImage($imageRequest);
        $trackRequest = $request->input("trackNum");
        $track = $this->getTrack($trackRequest, $request);
        $trackRequest = $this->resolveTrack($request);
        //EXIF: Model, ExposureTime, FocalLength, COMPUTED ApertureFNumber, and ISOSpeedRatings
        //$exifInfo = exif_read_data("/home/pi/blog/public/img/germany.jpg");
        return view('welcome')
            ->with(['name' => $name,
            'links' => $links,
            'image' => $image, //This will resolve to img/<pic>
            'track' => $track,
            'trackNum' => $trackRequest,
            //TODO Fix the pipe for image stuff
            'imageNum' => $imageRequest,]);
    }

    private function getImage($imageNumber) {
        $maxImage = 0;
        $imageNumber = (int)$imageNumber;
        $files = glob("/home/pi/blog/public/img/*");
        if ($files) {
            $maxImage = count($files);
        }
        if ($imageNumber < 0) {
            $imageNumber = $maxImage - 1;
        }
        else if ($imageNumber == $maxImage) {
            $imageNumber = 0;
        }
        return "img/".basename($files[$imageNumber]);
    }

    private function resolveImage($imageNumber) {
        $maxImage = 0;
        $imageNumber = (int)$imageNumber;
        $files = glob("/home/pi/blog/public/img/*");
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

    private function getTrack($trackNum, $request) {
        if (!$trackNum) {
            $trackNum = 1;
        }
        if ($request->input('trackNum') === "0") {
            $trackNum = 0;
        }
        $maxTrack = Music::count();
        if ($trackNum > $maxTrack) {
            $trackNum = 1;
        }
        if ($trackNum < 1) {
            $trackNum = $maxTrack;
        }
        return Music::where("id", "=", $trackNum)->get()[0];
    }

    private function resolveTrack($request) {
        $trackNum = $request->input("trackNum");
        if (!$trackNum) {
            $trackNum = 1;
        }
        if ($request->input('trackNum') === "0") {
            $trackNum = 0;
        }
        $maxTrack = Music::count();
        if ($trackNum > $maxTrack) {
            $trackNum = 1;
        }
        if ($trackNum < 1) {
            $trackNum = $maxTrack;
        }
        return $trackNum;
    }
}
