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
        $trackRequest = ($request->input("trackNum") ? $request->input("trackNum") : 1);
        $imageRequest = ($request->input("imageNum") ? $request->input("imageNum") : 0);

        //TODO: move this to a function to get an image
        $maxImage = 0;
        $files = glob("/home/pi/blog/public/img/*");
        if ($files) {
            $maxImage = count($files);
        }
        if ($imageRequest < 0) {
            $imageRequest = $maxImage - 1;
        }
        else if ($imageRequest == $maxImage) {
            $imageRequest = 0;
        }
        $image = "img/".basename($files[$imageRequest]);
        //End image function

        //TODO: move this to a function to derive a track
        $maxTrack = Music::count();
        if ($trackRequest > $maxTrack) {
            $trackRequest = 1;
        }
        else if ($trackRequest < 1) {
            $trackRequest = $maxTrack;
        }
        $track = Music::where("id", "=", $trackRequest)->get()[0];
        //End track function
        //EXIF: Model, ExposureTime, FocalLength, COMPUTED ApertureFNumber, and ISOSpeedRatings
        //$exifInfo = exif_read_data("/home/pi/blog/public/img/germany.jpg");
        return view('welcome')
            ->with(['name' => $name,
            'links' => $links,
            'image' => $image, //This will resolve to img/<pic>
            'track' => $track,
            'trackNum' => $trackRequest,
            'imageNum' => $imageRequest,]);
    }
}
