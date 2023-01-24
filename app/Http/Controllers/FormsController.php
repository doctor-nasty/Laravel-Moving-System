<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forms;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class FormsController extends Controller
{

    public function fetchModel(Request $request)
    {
        $data = \App\Models\Cars::where("make",$request->make)->get(["model", 'year'])->unique('model');
        // $dataUnique = $data->unique('model');
        return response()->json($data);
    }

    public function fetchYear(Request $request)
    {
        // $data = \App\Models\Cars::where("model",$request->model)->get(["year"])->unique('year');
        $data = DB::select('select * from year order by year DESC');
        // $dataUnique = $data->unique('model');
        return response()->json($data);
    }

    public function fetchZip(Request $request)
    {
        $data = \App\Models\Zip::where("ZIP",$request->ZIP)->get(["ZIP", "CITY"]);
        // $dataUnique = $data->unique('model');
        return response()->json($data);
    }

    public function fetchallowedState(Request $request)
    {
        $data = \App\Models\states::where("state_code", $request->allowedstateslist)->get();
        // $dataUnique = $data->unique('model');
        // return response()->json($data);

        return Redirect::back()->withErrors(['msg' => 'Can not get the state']);
    }

    public function fetchState(Request $request)
    {
        $requested = $request->STATE_CODE;

        $data = \App\Models\Zip::select("STATE_CODE as state_code", "COUNTY as county")
        ->where('state_code','LIKE',$requested)
        ->distinct('COUNTY')
        ->orderBy('COUNTY')
        ->get(["STATE_CODE", "COUNTY"]);


        // $dataUnique = $data->unique('model');
        return response()->json($data);
    }

    // public function autocomplete(Request $request)
    // {
    //     $data = \App\Models\Zip::select("CITY")
    //                 ->where('ZIP', 'LIKE', '%'. $request->get('query'). '%')
    //                 ->get()->unique('CITY');

    //     return response()->json($data);
    // }


    public function fetchCountry(Request $request)
    {
        $data = \App\Models\Country::where("continent",$request->continent)->get(["country"]);
        // $dataUnique = $data->unique('model');
        return response()->json($data);
    }



}
