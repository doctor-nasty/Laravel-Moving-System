<?php

namespace App\Http\Controllers;

use App\Models\carshp;
use App\Models\Company;
use App\Models\Country;
use App\Models\inst;
use App\Models\intl;
use App\Models\jct_cmp_st;
use App\Models\jct_fr_cnty;
use App\Models\jct_fr_days;
use App\Models\jct_svc_mvsz;
use App\Models\jct_svc_strg;
use App\Models\jct_to_cntry;
use App\Models\jct_to_stt;
use App\Models\jct_cmp_ld;
use App\Models\mvsz;
use App\Models\payments;
use App\Models\storage;
use App\Models\User;
use App\Models\Zip;
use App\Models\states;
use App\Models\strg;
use App\Models\zipcodes;
// use App\Exports\companysExport;
// use App\Imports\companysImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\Console\Input\Input;
use Intervention\Image\ImageManagerStatic as Image;


class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * List company
     * @param Nill
     * @return Array $company
     * @author Shani Singh
     */
    public function index()
    {
        $company = Company::select('company.id', 'company.name', 'company.status', 'company.created_at')
        ->orderBy('company.id', 'asc')
        ->paginate(10);

        return view('admin.company.index', ['company' => $company]);
    }


    public function assignmentstorage($id)
    {
        $company = Company::findOrFail($id);

        $states = zipcodes::select('state_code', 'id')
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');

        $counties = zipcodes::select(DB::raw('county, id, state_code'))
        ->where('county', '<>', '')
        ->where('state_code', '=', 'CA')
        ->groupBy('county', 'id', 'state_code')
        ->orderBy('county')
        ->orderBy('id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');


        $storages = storage::orderBy('id')
        ->get();

        $jct_fr_cnty_strg = jct_fr_cnty::where('cmp_id', $id)
        ->where('svc_id', '4')
        ->get()
        ->unique('cnty_id');

        $jct_svc_strg = jct_svc_strg::where('cmp_id', $id)
        ->get();

        $jct_cmp_st = jct_cmp_st::where('cmp_id', $id)
        ->get();

        $allowedstates = states::where('status', '1')
        ->get();

        $selectedCntys = jct_fr_cnty::select('cnty_id', 'zipcodes.county as county', 'zipcodes.state_code as state_code')
        ->where('cmp_id', $id)
        ->where('svc_id', 4)
        ->leftJoin('zipcodes', 'jct_fr_cnty.cnty_id', 'zipcodes.id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');

        return view('admin.company.storage.assignment', [
        'jct_fr_cnty_strg' => $jct_fr_cnty_strg,
        'jct_svc_strg' => $jct_svc_strg,
        'jct_cmp_st' => $jct_cmp_st,
         'storages' => $storages,
           'company' => $company,
           'id' => $id,
           'states' => $states,
           'selectedCntys' => $selectedCntys,
             'allowedstates' => $allowedstates,
              'counties' => $counties]);
    }

    public function assignmentstoragestates($id, $state)
    {
        $company = Company::findOrFail($id);


        $st = states::where('state_code',$state)->take(1)->implode('state_code', ', ');


        $states = zipcodes::select('STATE_CODE as state_code', 'id')
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');


        $counties = zipcodes::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
        ->where('county', '<>', '')
        ->where('state_code', '=', $st)
        ->groupBy('county', 'id', 'state_code')
        ->orderBy('county')
        ->orderBy('id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');

        $jct_fr_cnty_strg = jct_fr_cnty::where('cmp_id', $id)
        ->where('svc_id', '4')
        ->get()
        ->unique('cnty_id');

        $jct_cmp_st = jct_cmp_st::where('cmp_id', $id)
        ->get();

        $allowedstates = states::where('status', '1')
        ->get();


        return view('admin.company.storage.assignmentstates', [
        'jct_fr_cnty_strg' => $jct_fr_cnty_strg,
        'jct_cmp_st' => $jct_cmp_st,
           'company' => $company,
           'id' => $id,
           'states' => $states,
           'st' => $st,
             'allowedstates' => $allowedstates,
              'counties' => $counties]);
    }

    public function assignmentstoragestatesinterstate($id, $state)
    {
        $company = Company::findOrFail($id);


        $st = states::where('state_code',$state)->take(1)->implode('state_code', ', ');


        $counties = zipcodes::select(DB::raw('county, id, state_code'))
        ->where('county', '<>', '')
        ->where('state_code', '=', $st)
        ->groupBy('county', 'id', 'state_code')
        ->orderBy('county')
        ->orderBy('id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');

        $jct_cmp_st = jct_cmp_st::where('cmp_id', $id)
        ->get();

        $allowedstates = states::where('status', '1')
        ->get();

        $jct_fr_cnty = jct_fr_cnty::where('cmp_id', $id)
        ->get()
        ->unique('cnty_id');

        return view('admin.company.interstate.assignmentstates', [
        'jct_cmp_st' => $jct_cmp_st,
           'jct_fr_cnty' => $jct_fr_cnty,
           'company' => $company,
           'id' => $id,
           'st' => $st,
             'allowedstates' => $allowedstates,
              'counties' => $counties]);
    }

    public function assignmentcarshipping($id)
    {
        $company = Company::findOrFail($id);

        $states = zipcodes::select('STATE_CODE as state_code', 'id')
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');

        $counties = zipcodes::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
        ->where('county', '<>', '')
        ->where('state_code', '=', $company->state)
        ->groupBy('county', 'id', 'state_code')
        ->orderBy('county')
        ->orderBy('id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');

        $jct_fr_days_car = DB::table('jct_fr_days')
        ->where('cmp_id', $id)
        ->where('svc_id', '3')
        ->first();

        $jct_fr_cnty_car = jct_fr_cnty::where('cmp_id', $id)
        ->where('svc_id', '3')
        ->get()
        ->unique('cnty_id');

        $jct_to_stt_car = jct_to_stt::where('cmp_id', $id)
        ->where('svc_id', '3')
        ->get()
        ->unique('st_id');


        $allowedstates = states::where('status', '1')
        ->get();

        $jct_cmp_st = jct_cmp_st::where('cmp_id', $id)
        ->get();

        $selectedCntys = jct_fr_cnty::select('cnty_id', 'zipcodes.county as county', 'zipcodes.state_code as state_code')
        ->where('cmp_id', $id)
        ->where('svc_id', 3)
        ->leftJoin('zipcodes', 'jct_fr_cnty.cnty_id', 'zipcodes.id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');


        return view('admin.company.carshipping.assignment', [
        'jct_to_stt_car' => $jct_to_stt_car,
        'jct_fr_cnty_car' => $jct_fr_cnty_car,
        'allowedstates' => $allowedstates,
        'jct_cmp_st' => $jct_cmp_st,
        'selectedCntys' => $selectedCntys,
           'company' => $company,
           'jct_fr_days_car' => $jct_fr_days_car,
             'id' => $id,
              'states' => $states,
              'counties' => $counties]);
    }

    public function assignmentinternational($id)
    {
        $company = Company::findOrFail($id);

        $states = zipcodes::select('STATE_CODE as state_code', 'id')
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');

        $countries = Country::select('country', 'id')
        ->groupBy('country', 'id')
        ->orderBy('country')
        ->get('country', 'id')
        ->unique('country');

        $continents = Country::select('continent', 'id')
        ->groupBy('continent', 'id')
        ->orderBy('continent')
        ->get('continent', 'id')
        ->unique('continent');


        $counties = zipcodes::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
        ->where('county', '<>', '')
        ->groupBy('county', 'id', 'state_code')
        ->orderBy('county')
        ->orderBy('id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');

        $movesize = mvsz::orderBy('mvsz_id')
        ->get();

        $jct_fr_days_internat = DB::table('jct_fr_days')
        ->where('cmp_id', $id)
        ->where('svc_id', '2')
        ->first();

        $jct_fr_cnty_internat = jct_fr_cnty::where('cmp_id', $id)
        ->where('svc_id', '2')
        ->get()
        ->unique('cnty_id');


        $jct_to_stt = jct_to_stt::where('cmp_id', $id)
        ->get()
        ->unique('st_id');

        $jct_to_cntry = jct_to_cntry::where('cmp_id', $id)
        ->get()
        ->unique('cntry_id');


        $jct_svc_mvsz_internat = jct_svc_mvsz::where('cmp_id', $id)
        ->where('svc_id', '2')
        ->get();

        $allowedstates = states::where('status', '1')
        ->get();

        $jct_cmp_st = jct_cmp_st::where('cmp_id', $id)
        ->get();

        $selectedCntys = jct_fr_cnty::select('cnty_id', 'zipcodes.county as county', 'zipcodes.state_code as state_code')
        ->where('cmp_id', $id)
        ->where('svc_id', 2)
        ->leftJoin('zipcodes', 'jct_fr_cnty.cnty_id', 'zipcodes.id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');


        return view('admin.company.international.assignment', ['jct_to_stt' => $jct_to_stt,
         'jct_to_cntry' => $jct_to_cntry,
         'jct_fr_cnty_internat' => $jct_fr_cnty_internat,
         'jct_svc_mvsz_internat' => $jct_svc_mvsz_internat,
         'jct_fr_days_internat' => $jct_fr_days_internat,
         'jct_cmp_st' => $jct_cmp_st,
           'company' => $company,
           'id' => $id,
           'continents' => $continents,
           'selectedCntys' => $selectedCntys,
              'states' => $states,
              'counties' => $counties,
              'allowedstates' => $allowedstates,
              'countries' => $countries,
                'movesize' => $movesize]);
    }


    public function assignmentsstateinternational($id, $state)
    {
        $company = Company::findOrFail($id);
        $st = states::where('state_code',$state)->take(1)->implode('state_code', ', ');


        $states = zipcodes::select('STATE_CODE as state_code', 'id')
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');

        $counties = zipcodes::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
        ->where('county', '<>', '')
        ->where('state_code', '=', $st)
        ->groupBy('county', 'id', 'state_code')
        ->orderBy('county')
        ->orderBy('id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');

        $jct_fr_cnty_internat = jct_fr_cnty::where('cmp_id', $id)
        ->where('svc_id', '2')
        ->get()
        ->unique('cnty_id');

        $allowedstates = states::where('status', '1')
        ->get();


        return view('admin.company.international.assignmentstates', [
         'jct_fr_cnty_internat' => $jct_fr_cnty_internat,
           'company' => $company,
           'id' => $id,
           'st' => $st,
             'allowedstates' => $allowedstates,
             'states' => $states,
              'counties' => $counties]);
    }


    public function assignmentscontinentinternational($id, $continent)
    {
        $company = Company::findOrFail($id);

        $cnt = Country::where('continent',$continent)->take(1)->implode('continent', ', ');

        $countries = Country::select('country', 'id')
        ->where('continent', $cnt)
        ->groupBy('country', 'id')
        ->orderBy('country')
        ->get('country', 'id')
        ->unique('country');

        $jct_to_cntry = jct_to_cntry::where('cmp_id', $id)
        ->get();

        return view('admin.company.international.assignmentcountries', [
           'company' => $company,
           'id' => $id,
           'cnt' => $cnt,
           'countries' => $countries,
           'jct_to_cntry' => $jct_to_cntry,
             'continent' => $continent]);
    }


    public function assignmentsstatecarshipping($id, $state)
    {
        $company = Company::findOrFail($id);
        $st = states::where('state_code',$state)->take(1)->implode('state_code', ', ');

        $states = zipcodes::select('STATE_CODE as state_code', 'id')
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');

        $counties = zipcodes::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
        ->where('county', '<>', '')
        ->where('state_code', '=', $st)
        ->groupBy('county', 'id', 'state_code')
        ->orderBy('county')
        ->orderBy('id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');

        $jct_fr_cnty_car = jct_fr_cnty::where('cmp_id', $id)
        ->where('svc_id', '3')
        ->get()
        ->unique('cnty_id');

        $allowedstates = states::where('status', '1')
        ->get();



        return view('admin.company.carshipping.assignmentstates', [
         'jct_fr_cnty_car' => $jct_fr_cnty_car,
           'company' => $company,
           'st' => $st,
           'id' => $id,
             'allowedstates' => $allowedstates,
             'states' => $states,
              'counties' => $counties]);
    }

    public function assignmentinterstate($id)
    {
        $company = Company::findOrFail($id);


        $allowedstates = states::where('status', '1')
        ->pluck('state_code')->toArray();

        $as = states::where('status', '1')
        ->get();

        $states = zipcodes::select('state_code', 'id')
        ->where(function ($query) use ($allowedstates) {
            foreach ($allowedstates as $allowedstate) {
               $query->orWhere('state_code', 'like', $allowedstate);
            }
        })
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');

        $movesize = mvsz::orderBy('mvsz_id')
        ->get();

        $jct_fr_days = DB::table('jct_fr_days')
        ->where('cmp_id', $id)
        ->where('svc_id', '1')
        ->first();

        $jct_fr_cnty = jct_fr_cnty::where('cmp_id', $id)
        ->get()
        ->unique('cnty_id');

        $jct_to_stt = jct_to_stt::where('cmp_id', $id)
        ->get()
        ->unique('st_id');

        $jct_svc_mvsz = jct_svc_mvsz::where('cmp_id', $id)
        ->get();

        $jct_cmp_st = jct_cmp_st::where('cmp_id', $id)
        ->get();

        // $selectedCntys = jct_fr_cnty::where('cmp_id', $id)
        // ->where('svc_id', 4)
        // ->get('cnty_id');

        $counties = zipcodes::select(DB::raw('county, id, state_code'))
        ->where('county', '<>', '')
        ->where('state_code', '=', $company->state)
        ->groupBy('county', 'id', 'state_code')
        ->orderBy('county')
        ->orderBy('id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');

        $selectedCntys = jct_fr_cnty::select('cnty_id', 'zipcodes.county as county', 'zipcodes.state_code as state_code')
        ->where('cmp_id', $id)
        ->where('svc_id', 1)
        ->leftJoin('zipcodes', 'jct_fr_cnty.cnty_id', 'zipcodes.id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');

        // if(count($selectedCntys) > 0){
        //     dd('EMPTY');
        // }
        // else{
        //     dd('NOT EMPTY');
        // }

        // $cntys = zipcodes::select('id', 'county', 'state_code')
        // ->where(function ($query) use ($selectedCntys) {
        //     foreach ($selectedCntys as $selectedCnty) {
        //        $query->whereIn('id', $selectedCnty);
        //     }
        // })
        // ->get()
        // ->unique('county');

        // $test = zipcodes::where('id', 'LIKE', 'junctioncntys.cnty_id')->get();


        // return $selectedCntys;

        return view('admin.company.interstate.assignment', ['jct_to_stt' => $jct_to_stt,
        'jct_svc_mvsz' => $jct_svc_mvsz,
         'jct_fr_cnty' => $jct_fr_cnty,
         'company' => $company,
         'as' => $as,
         'selectedCntys' => $selectedCntys,
           'jct_fr_days' => $jct_fr_days,
           'jct_cmp_st' => $jct_cmp_st,
             'id' => $id,
             'states' => $states,
             'allowedstates' => $allowedstates,
              'counties' => $counties,
                'movesize' => $movesize]);

    }

    public function postmindaysinterstate(Request $request)
    {
        // Validations
        $request->validate([
            'mindaysinter'    => 'required'
        ]);

        $company = Company::whereId($request->cmp_id)
        ->get('id')
        ->first();

        DB::beginTransaction();
        try {

        DB::table('jct_fr_days')
        ->where('cmp_id', '=', $request->cmp_id)
        ->where('svc_id', '=', $request->svc_id)
        ->delete();


            // Store Data
            $companyassign = jct_fr_days::create([
                'days'    => $request->mindaysinter,
                'cmp_id' => $request->cmp_id,
                'svc_id' => $request->svc_id
            ]);

            DB::commit();

            return redirect()->route('company.assignment', ['company' => $company])->with('success','Minimum Days Updated.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function postcntyinterstate(Request $request)
    {


        $county_nm = zipcodes::where('id', '=', $request->cnty_id)->select('county')->first();
        $find_all_zip = zipcodes::where('county',$county_nm->county)->select('id')->get();
        if(sizeof($find_all_zip)>0)
        {
            foreach($find_all_zip as $items)
            {
                $jct_fr_cnty = jct_fr_cnty::where('cnty_id', '=', $items->id)->where('cmp_id',$request->cmp_id)->where('svc_id',$request->svc_id)->get();

                if (count($jct_fr_cnty) === 0) {
                    jct_fr_cnty::whereId($request->id)->create([
                        'cmp_id' => $request->cmp_id,
                        'cnty_id' => $items->id,
                        'svc_id' => $request->svc_id
                    ]);
                }

            }
        }
        return response()->json(['success'=>'Data is successfully added']);
    }

    public function postcntyinterstaterem(Request $request)
    {

        $county_nm = zipcodes::where('id', '=', $request->cnty_id)->select('county')->first();
        $find_all_zip = zipcodes::where('county',$county_nm->county)->select('id')->get();
        if(sizeof($find_all_zip)>0)
        {
            foreach($find_all_zip as $items)
            {
                jct_fr_cnty::where('cnty_id', '=', $items->id)->where('cmp_id',$request->cmp_id)->where('svc_id',$request->svc_id)->delete();
            }
        }

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function posttostinterstate(Request $request)
    {
        $state_nm = zipcodes::where('id', '=', $request->st_id)->select('state')->first();
        $find_all_zip = zipcodes::where('state',$state_nm->state)->select('id')->get();
        if(sizeof($find_all_zip)>0)
        {
            foreach($find_all_zip as $items)
            {
        $jct_to_stt = jct_to_stt::where('st_id', '=', $items->id)->where('cmp_id',$request->cmp_id)->where('svc_id',$request->svc_id)->get();

        if (count($jct_to_stt) === 0) {
            jct_to_stt::whereId($request->id)->create([
                'cmp_id' => $request->cmp_id,
                'st_id' => $items->id,
                'svc_id' => $request->svc_id
            ]);
        }
            }
        }

        return response()->json(['success'=>'Data is successfully added']);
    }

    public function posttostinterstaterem(Request $request)
    {

        $state_nm = zipcodes::where('id', '=', $request->st_id)->select('state')->first();
        $find_all_zip = zipcodes::where('state',$state_nm->state)->select('id')->get();
        if(sizeof($find_all_zip)>0)
        {
            foreach($find_all_zip as $items)
            {
        jct_to_stt::where('st_id', '=', $items->id)->where('cmp_id',$request->cmp_id)->where('svc_id',$request->svc_id)->delete();
            }
        }
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function posttocntryinternat(Request $request)
    {

        $jct_to_cntry = jct_to_cntry::where('cntry_id', '=', $request->cntry_id)->get();

        if (count($jct_to_cntry) === 0) {
            jct_to_cntry::whereId($request->id)->create([
                'cmp_id' => $request->cmp_id,
                'cntry_id' => $request->cntry_id
            ]);
        }

        return response()->json(['success'=>'Data is successfully added']);
    }

    public function posttocntryrem(Request $request)
    {

        jct_to_cntry::where('cntry_id', '=', $request->cntry_id)
        ->where('cmp_id', $request->cmp_id)
        ->where('cntry_id', $request->cntry_id)
        ->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }


    public function postmvszinterstate(Request $request)
    {

        $jct_svc_mvsz = jct_svc_mvsz::where('mvsz_id', '=', $request->mvsz_id)->get();

        if (count($jct_svc_mvsz) === 0) {
            jct_svc_mvsz::whereId($request->id)->create([
                'cmp_id' => $request->cmp_id,
                'mvsz_id' => $request->mvsz_id,
                'svc_id' => $request->svc_id
            ]);
        }

        return response()->json(['success'=>'Data is successfully added']);
    }

    public function postmvszinterstaterem(Request $request)
    {

        jct_svc_mvsz::where('mvsz_id', '=', $request->mvsz_id)->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }


    public function poststrg(Request $request)
    {

        $jct_svc_strg = jct_svc_strg::where('strg_id', '=', $request->strg_id)->get();

        if (count($jct_svc_strg) === 0) {
            jct_svc_strg::whereId($request->id)->create([
                'cmp_id' => $request->cmp_id,
                'strg_id' => $request->strg_id,
                'svc_id' => $request->svc_id
            ]);
        }

        return response()->json(['success'=>'Data is successfully added']);
    }

    public function poststrgrem(Request $request)
    {

        jct_svc_strg::where('strg_id', '=', $request->strg_id)->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    /**
     * Create company
     * @param Nill
     * @return Array $company
     * @author Shani Singh
     */
    public function create()
    {
        return view('admin.company.add');
    }

    /**
     * Store company
     * @param Request $request
     * @return View companys
     * @author Shani Singh
     */
    public function store(Request $request)
    {

        // Validations
        $request->validate([
            'name'    => 'required',
            'website'    => 'required',
            'address'    => 'required',
            'city'    => 'required',
            'state'    => 'required',
            'zip'    => 'required|numeric|digits:5',
            'phonenumber'    => 'required',
            'description'    => 'required',
            'usdot'    => 'required',
            'mcno'    => 'required',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            // 'intrastate'    => 'required',
            // 'fleetsize'    => 'required',
            'email'         => 'required',
            'phonenumber' => 'required|numeric|digits:10',
            'status'       =>  'required|numeric|in:0,1',
        ]);




        DB::beginTransaction();
        try {


            $imageName = time().'.'.$request->logo->extension();


            // Store Data
            $company = Company::create([
                'name'    => $request->name,
                'website'    => $request->website,
                'address'    => $request->address,
                'city'    => $request->city,
                'state'    => $request->state,
                'zip'    => $request->zip,
                'phonenumber'    => $request->phonenumber,
                'description'    => $request->description,
                'usdot'    => $request->usdot,
                'mcno'    => $request->mcno,
                'logo'    => $imageName,
                'intrastate'    => $request->intrastate,
                'fleetsize'    => $request->fleetsize,
                'email'         => $request->email,
                'status'       =>  $request->status,
            ]);


            $request->logo->move(public_path('images/companies'), $imageName);


            $company->save();

            DB::commit();


            return redirect()->route('company.index')->with('success','company Created Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Update Status Of company
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    public function updateStatus($id, $status)
    {
        // Validation
        $validate = Validator::make([
            'id'   => $id,
            'status'    => $status
        ], [
            'id'   =>  'required|exists:company,id',
            'status'    =>  'required|in:0,1',
        ]);

        // If Validations Fails
        if($validate->fails()){
            return redirect()->route('company.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            Company::whereId($id)->update(['status' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('company.index')->with('success','company Status Updated Successfully!');
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Edit company
     * @param Integer $company
     * @return Collection $company
     * @author Shani Singh
     */
    public function edit(Company $company)
    {



        return view('admin.company.edit')->with([
            'company'  => $company,
        ]);
    }

    /**
     * Update company
     * @param Request $request, company $company
     * @return View companys
     * @author Shani Singh
     */
    public function update(Request $request, Company $company)
    {
        // Validations
        $request->validate([
            'name'    => 'required',
            'website'    => 'required',
            'address'    => 'required',
            'city'    => 'required',
            'state'    => 'required',
            'zip'    => 'required',
            'phonenumber'    => 'required',
            'description'    => 'required',
            'usdot'    => 'required',
            'mcno'    => 'required',
            'intrastate'    => 'required',
            'fleetsize'    => 'required',
            // 'email'         => 'required|unique:companys,email,'.$company->id.',id',
            'phonenumber' => 'required|numeric|digits:10',
            'status'       =>  'required|numeric|in:0,1',
        ]);


        DB::beginTransaction();
        try {

            // Store Data
            $company_updated = Company::whereId($company->id)->update([

            'name'    => $request->name,
            'website'    => $request->website,
            'address'    => $request->address,
            'city'    => $request->city,
            'state'    => $request->state,
            'zip'    => $request->zip,
            'phonenumber'    => $request->phonenumber,
            'description'    => $request->description,
            'usdot'    => $request->usdot,
            'mcno'    => $request->mcno,
            'intrastate'    => $request->intrastate,
            'fleetsize'    => $request->fleetsize,
            // 'email'         => 'required|unique:companys,email,'.$company->id.',id',
            'status'       =>  $request->status,
            ]);


            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('company.index')->with('success','company Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function storeImage(Request $request, Company $company)
    {
        $company_id = $request->input('company_id');


        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $image = $request->file('logo');
        $input['imagename'] = time().'.'.$image->extension();

        $destinationPath = public_path('images/companies');

        $img = Image::make($image->path());

        $img->resize(400, 200, function ($constraint) {
            $constraint->aspectRatio();

        })->save($destinationPath.'/'.$input['imagename']);

        // \Log::info('Updating company with ID: ' . $company_id . ' and new image: ' . $input['imagename']);

        // $rows_updated = Company::where('id', $company_id)->update(['logo' => $input['imagename']]);

        // \Log::info('Rows updated: ' . $rows_updated);
        // \Log::info('Company updated: ' . json_encode(Company::find($company_id)));

        return back()->with('success', 'Image uploaded Successfully!')
        ->with('logo', $input['imagename']);


    }

    /**
     * Delete company
     * @param company $company
     * @return Index companys
     * @author Shani Singh
     */
    public function delete(company $company)
    {
        DB::beginTransaction();
        try {
            // Delete company
            Company::whereId($company->id)->delete();

            DB::commit();
            return redirect()->route('companys.index')->with('success', 'company Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Import companys
     * @param Null
     * @return View File
     */
    public function importcompanys()
    {
        return view('admin.companys.import');
    }

    public function uploadcompanys(Request $request)
    {
        Excel::import(new companysImport, $request->file);

        return redirect()->route('companys.index')->with('success', 'company Imported Successfully');
    }

    public function export()
    {
        return Excel::download(new companysExport, 'companys.xlsx');
    }

    public function payments($id)
    {
        $company = Company::findOrFail($id);

        $payments = DB::table('payments')->where('cmp_id', $company->id)->get();

        return view('admin.company.payments', compact('company', 'payments'));
    }

    public function paymentupdatetotamnt(Request $request)
    {
        $request->validate([
            'tot_amnt'    => 'required|numeric'
        ]);

        $id = $request->input('id');
        $cmp_id = $request->input('cmp_id');

        // return $id;

        DB::beginTransaction();
        try {

            // Store Data
            $mvszprice = payments::query()
            ->where('id', $id)
            ->where('cmp_id', $cmp_id)
            ->first()
            ->update([
              'tot_amnt' => $request->input('tot_amnt')
            ]);

            DB::commit();

            return redirect()->back()->with('success','Total Amount Updated.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function paymentupdateldqty(Request $request)
    {
        $request->validate([
            'ld_qty'    => 'required|numeric'
        ]);

        $id = $request->input('id');
        $cmp_id = $request->input('cmp_id');

        // return $id;

        DB::beginTransaction();
        try {

            // Store Data
            $mvszprice = payments::query()
            ->where('id', $id)
            ->where('cmp_id', $cmp_id)
            ->first()
            ->update([
              'ld_qty' => $request->input('ld_qty')
            ]);

            DB::commit();

            return redirect()->back()->with('success','Lead Quantity Updated.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }




}
