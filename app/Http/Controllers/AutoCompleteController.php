<?php

namespace App\Http\Controllers;

use App\Models\states;
use App\Models\zipcodes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AutoCompleteController extends Controller
{
    public function autocomplete(Request $request)
    {

        $data = zipcodes::select("zip as value","state_code", "city")
            ->whereIn('state_code', ["VA", "PA", "MA", "SC", "TN", "IL", "GA", "FL", "NC", "CT", "CO", "CA", "NY", "NJ"])
            ->where('zip', 'LIKE', $request->get('inst_fr_zip') . '%')
            ->where('zip', 'LIKE', $request->get('intl_fr_zip') . '%')
            ->where('zip', 'LIKE', $request->get('carshp_fr_zip') . '%')
            ->where('zip', 'LIKE', $request->get('strg_zip') . '%')
            ->take(10)
            ->get();

        return response()->json($data);

    }

    public function autocompletemovingto(Request $request)
    {
        $data = zipcodes::select("zip as value", "city", "state_code")
            ->whereIn('state_code', ["VA", "PA", "MA", "SC", "TN", "IL", "GA", "FL", "NC", "CT", "CO", "CA", "NY", "NJ"])
            ->where('zip', 'LIKE', $request->get('inst_to_zip') . '%')
            ->where('zip', 'LIKE', $request->get('carshp_to_zip') . '%')
            ->take(10)
            ->get();

        return response()->json($data);
    }
}
