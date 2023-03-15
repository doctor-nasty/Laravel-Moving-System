<?php

namespace App\Http\Controllers;

use App\Models\mvsz;
use App\Models\states;
use App\Models\zipcodes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $countries = \App\Models\Country::orderBy('country','asc')->get();
        $continents = \App\Models\Country::orderBy('continent','asc')->get()->unique('continent');
        $states = states::where('status', 1)->get();
        $movesize = mvsz::get();

        $cars = \App\Models\Cars::orderBy('make','asc')->orderBy('year','desc')->get();
        $carsUnique = $cars->unique('make');
        $yearUnique = $cars->unique('year');
        $interstateform = "";

        // $make = $cars->make;

        return view('pages.index', compact('carsUnique', 'states', 'movesize', 'interstateform', 'continents', 'countries', 'yearUnique'));
    }

    public function weather(Request $request)
    {
        // $ip = $request->ip();
        $ip = '108.170.85.66';

        $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
        $ipInfo = json_decode($ipInfo);
        $region = $ipInfo->region;
        $timezone = $ipInfo->timezone;

        return view('partials.weather', compact('ip', 'region', 'timezone'));
    }

    public function interstate(Request $request, states $state)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();


        // return $state;
        return view('pages.interstate', compact('movesize', 'states'));

    }

    public function interstatestate($stateslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();
        $cntys = zipcodes::where('state_code', $stateslug)->groupBy('county', 'state_code')->get();

        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');

        if ($stslug !== '') {
            return view('pages.interstatest', compact('states', 'movesize', 'stslug', 'cntys', 'stateslug'));

        } else {
            abort(404);

        }
    }

    public function interstatecnty($stateslug, $cntyslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();

        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');
        $stcslug = states::where('state_code', $stateslug)->implode('state_code', ', ');

        $cntyslug2 = zipcodes::where('county', $cntyslug)->get('county')->first();


        $ctys = zipcodes::where('state_code', $stateslug)->where('county', $cntyslug)->groupBy('city', 'state_code', 'county')->get();

        $cnty = $cntyslug2->county;

        // return $cntyslug2;


        if ($cntyslug2 !== '') {
            return view('pages.interstatecnty', compact('states', 'movesize', 'stslug', 'cntyslug', 'cnty', 'ctys', 'stcslug'));

        } else {
            abort(404);
        }

    }

    public function interstatecty($stateslug, $cntyslug, $ctyslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();

        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');

        $cntyslug2 = zipcodes::where('state_code', $stateslug)->get('county')->first();

        $ctyslug2 = zipcodes::where('state_code', $stateslug)->where('county', $cntyslug)->where('city', $ctyslug)->get('city')->first();

        $cnty = $cntyslug2->county;


        $cty = $ctyslug2->city;

        // return $ctyslug2;


        if ($ctyslug2 !== '') {
            return view('pages.interstatecty', compact('states', 'movesize', 'stslug', 'cntyslug', 'cnty', 'ctyslug'));
        } else {
            abort(404);

        }

    }

    public function international(Request $request)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();

        $countries = \App\Models\Country::orderBy('country','asc')->get();
        $continents = \App\Models\Country::orderBy('continent','asc')->get()->unique('continent');


        return view('pages.international', compact('movesize', 'countries', 'continents', 'states'));

    }

    public function internationalstate($stateslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();
        $cntys = zipcodes::where('state_code', $stateslug)->groupBy('county', 'state_code')->get();

        $countries = \App\Models\Country::orderBy('country','asc')->get();
        $continents = \App\Models\Country::orderBy('continent','asc')->get()->unique('continent');


        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');

        if ($stslug !== '') {
            return view('pages.internationalst', compact('states', 'movesize', 'stslug', 'cntys', 'continents', 'countries'));

        } else {
            abort(404);

        }
    }

    public function internationalcnty($stateslug, $cntyslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();
        $countries = \App\Models\Country::orderBy('country','asc')->get();
        $continents = \App\Models\Country::orderBy('continent','asc')->get()->unique('continent');


        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');

        $cntyslug2 = zipcodes::where('county', $cntyslug)->get('county')->first();


        $ctys = zipcodes::where('state_code', $stateslug)->where('county', $cntyslug)->groupBy('city', 'state_code', 'county')->get();

        $cnty = $cntyslug2->county;

        // return $cntyslug2;


        if ($cntyslug2 !== '') {
            return view('pages.internationalcnty', compact('states', 'movesize', 'stslug', 'cntyslug', 'cnty', 'ctys', 'continents', 'countries'));

        } else {
            abort(404);
        }

    }

    public function internationalcty($stateslug, $cntyslug, $ctyslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();
        $countries = \App\Models\Country::orderBy('country','asc')->get();
        $continents = \App\Models\Country::orderBy('continent','asc')->get()->unique('continent');


        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');

        $cntyslug2 = zipcodes::where('state_code', $stateslug)->get('county')->first();

        $ctyslug2 = zipcodes::where('state_code', $stateslug)->where('county', $cntyslug)->where('city', $ctyslug)->get('city')->first();

        $cnty = $cntyslug2->county;


        $cty = $ctyslug2->city;

        // return $ctyslug2;


        if ($ctyslug2 !== '') {
            return view('pages.internationalcty', compact('states', 'movesize', 'stslug', 'cntyslug', 'cnty', 'ctyslug', 'continents', 'countries'));
        } else {
            abort(404);

        }

    }

    public function carshipping(Request $request)
    {
        $cars = \App\Models\Cars::orderBy('make','asc')->orderBy('year','desc')->get();
        $states = states::where('status', 1)->get();

        $carsUnique = $cars->unique('make');
        $yearUnique = $cars->unique('year');


        return view('pages.carshipping', compact('cars', 'carsUnique', 'yearUnique', 'states'));

    }

    public function carshippingstate($stateslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();

        $cntys = zipcodes::where('state_code', $stateslug)->groupBy('county', 'state_code')->get();

        $cars = \App\Models\Cars::orderBy('make','asc')->orderBy('year','desc')->get();
        $carsUnique = $cars->unique('make');
        $yearUnique = $cars->unique('year');

        $countries = \App\Models\Country::orderBy('country','asc')->get();
        $continents = \App\Models\Country::orderBy('continent','asc')->get()->unique('continent');


        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');

        // $cnty2 = strtolower(ucfirst($cntys));

        // return $cnty2;

        if ($stslug !== '') {
            return view('pages.carshippingstate', compact('states', 'movesize', 'stslug', 'cntys', 'continents', 'countries', 'cars', 'carsUnique', 'yearUnique'));

        } else {
            abort(404);

        }
    }

    public function carshippingcnty($stateslug, $cntyslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();
        $cars = \App\Models\Cars::orderBy('make','asc')->orderBy('year','desc')->get();
        $carsUnique = $cars->unique('make');
        $yearUnique = $cars->unique('year');

        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');

        $cntyslug2 = zipcodes::where('county', $cntyslug)->get('county')->first();


        $ctys = zipcodes::where('state_code', $stateslug)->where('county', $cntyslug)->groupBy('city', 'state_code', 'county')->get();

        $cnty = $cntyslug2->county;

        // return $cntyslug2;


        if ($cntyslug2 !== '') {
            return view('pages.carshippingcnty', compact('states', 'movesize', 'stslug', 'cntyslug', 'cnty', 'ctys', 'cars', 'carsUnique', 'yearUnique'));

        } else {
            abort(404);
        }

    }

    public function carshippingcty($stateslug, $cntyslug, $ctyslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();
        $cars = \App\Models\Cars::orderBy('make','asc')->orderBy('year','desc')->get();
        $carsUnique = $cars->unique('make');
        $yearUnique = $cars->unique('year');

        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');

        $cntyslug2 = zipcodes::where('state_code', $stateslug)->get('county')->first();

        $ctyslug2 = zipcodes::where('state_code', $stateslug)->where('county', $cntyslug)->where('city', $ctyslug)->get('city')->first();

        $cnty = $cntyslug2->county;


        $cty = $ctyslug2->city;

        // return $ctyslug2;


        if ($ctyslug2 !== '') {
            return view('pages.carshippingcty', compact('states', 'movesize', 'stslug', 'cntyslug', 'cnty', 'ctyslug', 'cars', 'carsUnique', 'yearUnique'));
        } else {
            abort(404);

        }

    }

    public function storage(Request $request)
    {
        $states = states::where('status', 1)->get();



        return view('pages.storage', compact('states'));

    }

    public function storagestate($stateslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();
        $cntys = zipcodes::where('state_code', $stateslug)->groupBy('county', 'state_code')->get();

        $countries = \App\Models\Country::orderBy('country','asc')->get();
        $continents = \App\Models\Country::orderBy('continent','asc')->get()->unique('continent');


        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');

        if ($stslug !== '') {
            return view('pages.storagestate', compact('states', 'movesize', 'stslug', 'cntys', 'continents', 'countries'));

        } else {
            abort(404);

        }
    }

    public function storagecnty($stateslug, $cntyslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();

        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');

        $cntyslug2 = zipcodes::where('county', $cntyslug)->get('county')->first();


        $ctys = zipcodes::where('state_code', $stateslug)->where('county', $cntyslug)->groupBy('city', 'state_code', 'county')->get();

        $cnty = $cntyslug2->county;

        // return $cntyslug2;


        if ($cntyslug2 !== '') {
            return view('pages.storagecnty', compact('states', 'movesize', 'stslug', 'cntyslug', 'cnty', 'ctys'));

        } else {
            abort(404);
        }

    }

    public function storagecty($stateslug, $cntyslug, $ctyslug)
    {
        $movesize = mvsz::get();
        $states = states::where('status', 1)->get();

        $stslug = states::where('state_code', $stateslug)->implode('state_name', ', ');

        $cntyslug2 = zipcodes::where('state_code', $stateslug)->get('county')->first();

        $ctyslug2 = zipcodes::where('state_code', $stateslug)->where('county', $cntyslug)->where('city', $ctyslug)->get('city')->first();

        $cnty = $cntyslug2->county;


        $cty = $ctyslug2->city;

        // return $ctyslug2;


        if ($ctyslug2 !== '') {
            return view('pages.storagecty', compact('states', 'movesize', 'stslug', 'cntyslug', 'cnty', 'ctyslug'));
        } else {
            abort(404);

        }

    }
}
