<?php

namespace App\Http\Controllers;

use App\Models\states;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AutoCompleteController extends Controller
{
    public function autocomplete(Request $request)
    {

        $data = \App\Models\Zip::select("z_zip as value","z_state_code", "z_city")
            ->whereIn('z_state_code', ["VA", "PA", "MA", "SC", "TN", "IL", "GA", "FL", "NC", "CT", "CO", "CA", "NY", "NJ"])
            ->where('z_zip', 'LIKE', $request->get('inst_fr_zip') . '%')
            ->where('z_zip', 'LIKE', $request->get('intl_fr_zip') . '%')
            ->where('z_zip', 'LIKE', $request->get('carshp_fr_zip') . '%')
            ->where('z_zip', 'LIKE', $request->get('strg_zip') . '%')
            ->take(10)
            ->get();

        return response()->json($data);

    }

    public function autocompletemovingto(Request $request)
    {
        $data = \App\Models\Zip::select("z_zip as value", "z_city", "z_state_code")
            ->whereIn('z_state_code', ["VA", "PA", "MA", "SC", "TN", "IL", "GA", "FL", "NC", "CT", "CO", "CA", "NY", "NJ"])
            ->where('z_zip', 'LIKE', $request->get('inst_to_zip') . '%')
            ->where('z_zip', 'LIKE', $request->get('carshp_to_zip') . '%')
            ->take(10)
            ->get();

        return response()->json($data);
    }
}
