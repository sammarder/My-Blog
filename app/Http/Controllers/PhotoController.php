<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;

class PhotoController extends Controller
{
    //TODO: I want ApertureFNumber, Model, and lens but that last one may be difficult
    public function showPage(Request $request) {
        return view('photo');
    }
}
