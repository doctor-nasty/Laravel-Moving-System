<?php

namespace App\Http\Controllers;

use App\Models\mvsz;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $countries = \App\Models\Country::orderBy('country','asc')->get();
        $continents = \App\Models\Country::orderBy('continent','asc')->get()->unique('continent');
        $movesize = mvsz::get();


        $cars = \App\Models\Cars::orderBy('make','asc')->orderBy('year','desc')->get();
        $carsUnique = $cars->unique('make');
        $yearUnique = $cars->unique('year');
        $interstateform = "";

        // $make = $cars->make;

        return view('pages.index')->with('carsUnique', $carsUnique)->with('movesize', $movesize)->with('interstateform', $interstateform)->with('continents', $continents)->with('countries', $countries)->with('yearUnique', $yearUnique);
    }
}
