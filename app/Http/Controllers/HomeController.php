<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Request;
use App\Model\Link;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

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
        //EXIF: Model, ExposureTime, FocalLength, COMPUTED ApertureFNumber, and ISOSpeedRatings
        //$exifInfo = exif_read_data("/home/pi/blog/public/img/germany.jpg");
        return view('welcome')->with('name', $name)->with('links', $links);
    }

    public function test(Request $request) {
        print_r($this->count);
        $this->count = $this->count + 1;
        print_r($this->count);
    }
}
