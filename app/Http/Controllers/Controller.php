<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Model\Link;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
}
