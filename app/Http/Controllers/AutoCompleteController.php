<?php

namespace App\Http\Controllers;

use App\Models\states;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AutoCompleteController extends Controller
{
    public function autocomplete(Request $request)
    {

        $data = \App\Models\Zip::select("ZIP as value", "CITY as city", "STATE_CODE as state_code")
            ->whereIn('state_code', ["VA", "PA", "MA", "SC", "TN", "IL", "GA", "FL", "NC", "CT", "CO", "CA", "NY", "NJ"])
            ->where('ZIP', 'LIKE', $request->get('inst_fr_zip') . '%')
            ->where('ZIP', 'LIKE', $request->get('intl_fr_zip') . '%')
            ->where('ZIP', 'LIKE', $request->get('carshp_fr_zip') . '%')
            ->where('ZIP', 'LIKE', $request->get('strg_zip') . '%')
            ->take(10)
            ->get();

        return response()->json($data);

    }

    public function autocompletemovingto(Request $request)
    {
        $data = \App\Models\Zip::select("ZIP as value", "CITY as city", "STATE_CODE as state_code")
            ->whereIn('state_code', ["VA", "PA", "MA", "SC", "TN", "IL", "GA", "FL", "NC", "CT", "CO", "CA", "NY", "NJ"])
            ->where('ZIP', 'LIKE', $request->get('inst_to_zip') . '%')
            ->where('ZIP', 'LIKE', $request->get('carshp_to_zip') . '%')
            ->take(10)
            ->get();

        return response()->json($data);
    }
}
