<?php

namespace App\Http\Controllers;

use App\Models\carshp;
use App\Models\company;
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
use App\Models\storage;
use App\Models\User;
use App\Models\Zip;
use App\Models\states;
use App\Models\strg;
// use App\Exports\companysExport;
// use App\Imports\companysImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\Console\Input\Input;

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
        $company = Company::paginate(10);
        return view('company.index', ['company' => $company]);
    }

    // public function assignment($id)
    // {
    //     $company = Company::findOrFail($id);

    //     $states = Zip::select('STATE_CODE as state_code', 'id')
    //     ->where('state_code', '<>', '')
    //     ->groupBy('state_code', 'id')
    //     ->orderBy('state_code')
    //     ->get('state_code', 'id')
    //     ->unique('state_code');

    //     $countries = Country::select('country', 'id')
    //     ->groupBy('country', 'id')
    //     ->orderBy('country')
    //     ->get('country', 'id')
    //     ->unique('country');


    //     $counties = Zip::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
    //     ->where('county', '<>', '')
    //     ->where('state_code', '=', $company->state)
    //     ->groupBy('county', 'id', 'state_code')
    //     ->orderBy('county')
    //     ->orderBy('id')
    //     ->orderBy('state_code')
    //     ->get()
    //     ->unique('county');

    //     $movesize = mvsz::orderBy('mvsz_id')
    //     ->get();

    //     $storages = storage::orderBy('id')
    //     ->get();


    //     $jct_fr_days = DB::table('jct_fr_days')
    //     ->where('cmp_id', $id)
    //     ->where('svc_id', '1')
    //     ->first();

    //     $jct_fr_days_car = DB::table('jct_fr_days')
    //     ->where('cmp_id', $id)
    //     ->where('svc_id', '3')
    //     ->first();

    //     $jct_fr_days_internat = DB::table('jct_fr_days')
    //     ->where('cmp_id', $id)
    //     ->where('svc_id', '2')
    //     ->first();

    //     $jct_fr_cnty = jct_fr_cnty::where('cmp_id', $id)
    //     ->get()
    //     ->unique('cnty_id');

    //     $jct_fr_cnty_car = jct_fr_cnty::where('cmp_id', $id)
    //     ->where('svc_id', '3')
    //     ->get()
    //     ->unique('cnty_id');

    //     $jct_fr_cnty_internat = jct_fr_cnty::where('cmp_id', $id)
    //     ->where('svc_id', '2')
    //     ->get()
    //     ->unique('cnty_id');

    //     $jct_fr_cnty_strg = jct_fr_cnty::where('cmp_id', $id)
    //     ->where('svc_id', '4')
    //     ->get()
    //     ->unique('cnty_id');

    //     $jct_to_stt = jct_to_stt::where('cmp_id', $id)
    //     ->get()
    //     ->unique('st_id');

    //     $jct_to_stt_car = jct_to_stt::where('cmp_id', $id)
    //     ->where('svc_id', '3')
    //     ->get()
    //     ->unique('st_id');

    //     $jct_to_cntry = jct_to_cntry::where('cmp_id', $id)
    //     ->get()
    //     ->unique('cntry_id');


    //     $jct_svc_mvsz = jct_svc_mvsz::where('cmp_id', $id)
    //     ->get();

    //     $jct_svc_mvsz_internat = jct_svc_mvsz::where('cmp_id', $id)
    //     ->where('svc_id', '2')
    //     ->get();

    //     $jct_svc_strg = jct_svc_strg::where('cmp_id', $id)
    //     ->get();

    //     // $movesize = DB::select('select mvsz_id, mvsz_name from mvsz');


    //     return view('company.assignment', ['jct_to_stt' => $jct_to_stt,
    //     'jct_to_stt_car' => $jct_to_stt_car,
    //     'jct_svc_mvsz' => $jct_svc_mvsz,
    //     'jct_fr_cnty_strg' => $jct_fr_cnty_strg,
    //      'jct_fr_cnty' => $jct_fr_cnty,
    //      'jct_to_cntry' => $jct_to_cntry,
    //      'jct_fr_cnty_car' => $jct_fr_cnty_car,
    //      'jct_svc_strg' => $jct_svc_strg,
    //      'storages' => $storages,
    //      'jct_fr_cnty_internat' => $jct_fr_cnty_internat,
    //      'jct_svc_mvsz_internat' => $jct_svc_mvsz_internat,
    //      'jct_fr_days_internat' => $jct_fr_days_internat,
    //        'company' => $company,
    //        'jct_fr_days' => $jct_fr_days,
    //        'jct_fr_days_car' => $jct_fr_days_car,
    //          'id' => $id,
    //           'states' => $states,
    //           'counties' => $counties,
    //           'countries' => $countries,
    //             'movesize' => $movesize]);
    // }

    public function assignmentstorage($id)
    {
        $company = Company::findOrFail($id);

        $states = Zip::select('STATE_CODE as state_code', 'id')
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');

        $counties = Zip::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
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

        return view('company.storage.assignment', [
        'jct_fr_cnty_strg' => $jct_fr_cnty_strg,
        'jct_svc_strg' => $jct_svc_strg,
        'jct_cmp_st' => $jct_cmp_st,
         'storages' => $storages,
           'company' => $company,
           'id' => $id,
           'states' => $states,
             'allowedstates' => $allowedstates,
              'counties' => $counties]);
    }

    public function assignmentstoragestates($id, $state)
    {
        $company = Company::findOrFail($id);


        $st = states::where('state_code',$state)->take(1)->implode('state_code', ', ');


        $states = Zip::select('STATE_CODE as state_code', 'id')
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');


        $counties = Zip::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
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

        return view('company.storage.assignmentstates', [
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


        $counties = Zip::select(DB::raw('z_county, zipcode, z_state_code'))
        ->where('z_county', '<>', '')
        ->where('z_state_code', '=', $st)
        ->groupBy('z_county', 'zipcode', 'z_state_code')
        ->orderBy('z_county')
        ->orderBy('zipcode')
        ->orderBy('z_state_code')
        ->get()
        ->unique('z_county');

        $jct_cmp_st = jct_cmp_st::where('cmp_id', $id)
        ->get();

        $allowedstates = states::where('status', '1')
        ->get();

        $jct_fr_cnty = jct_fr_cnty::where('cmp_id', $id)
        ->get()
        ->unique('cnty_id');

        return view('company.interstate.assignmentstates', [
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

        $states = Zip::select('STATE_CODE as state_code', 'id')
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');

        $counties = Zip::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
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


        return view('company.carshipping.assignment', [
        'jct_to_stt_car' => $jct_to_stt_car,
        'jct_fr_cnty_car' => $jct_fr_cnty_car,
        'allowedstates' => $allowedstates,
        'jct_cmp_st' => $jct_cmp_st,

           'company' => $company,
           'jct_fr_days_car' => $jct_fr_days_car,
             'id' => $id,
              'states' => $states,
              'counties' => $counties]);
    }

    public function assignmentinternational($id)
    {
        $company = Company::findOrFail($id);

        $states = Zip::select('STATE_CODE as state_code', 'id')
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


        $counties = Zip::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
        ->where('county', '<>', '')
        ->where('state_code', '=', $company->state)
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


        return view('company.international.assignment', ['jct_to_stt' => $jct_to_stt,
         'jct_to_cntry' => $jct_to_cntry,
         'jct_fr_cnty_internat' => $jct_fr_cnty_internat,
         'jct_svc_mvsz_internat' => $jct_svc_mvsz_internat,
         'jct_fr_days_internat' => $jct_fr_days_internat,
         'jct_cmp_st' => $jct_cmp_st,
           'company' => $company,
             'id' => $id,
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


        $states = Zip::select('STATE_CODE as state_code', 'id')
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');

        $counties = Zip::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
        ->where('county', '<>', '')
        ->where('state_code', '=', $company->state)
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

        return view('company.international.assignmentstates', [
         'jct_fr_cnty_internat' => $jct_fr_cnty_internat,
           'company' => $company,
           'id' => $id,
           'st' => $st,
             'allowedstates' => $allowedstates,
             'states' => $states,
              'counties' => $counties]);
    }


    public function assignmentsstatecarshipping($id, $state)
    {
        $company = Company::findOrFail($id);
        $st = states::where('state_code',$state)->take(1)->implode('state_code', ', ');

        $states = Zip::select('STATE_CODE as state_code', 'id')
        ->where('state_code', '<>', '')
        ->groupBy('state_code', 'id')
        ->orderBy('state_code')
        ->get('state_code', 'id')
        ->unique('state_code');

        $counties = Zip::select(DB::raw('COUNTY as county, id, STATE_CODE as state_code'))
        ->where('county', '<>', '')
        ->where('state_code', '=', $company->state)
        ->groupBy('county', 'id', 'state_code')
        ->orderBy('county')
        ->orderBy('id')
        ->orderBy('state_code')
        ->get()
        ->unique('county');

        $jct_fr_cnty_car = jct_fr_cnty::where('cmp_id', $id)
        ->where('svc_id', '2')
        ->get()
        ->unique('cnty_id');

        $allowedstates = states::where('status', '1')
        ->get();



        return view('company.carshipping.assignmentstates', [
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
        ->get();

        $states = Zip::select('z_state_code', 'zipcode')
        ->where('z_state_code', '<>', '')
        ->groupBy('z_state_code', 'zipcode')
        ->orderBy('z_state_code')
        ->get('z_state_code', 'zipcode')
        ->unique('z_state_code');

        $counties = Zip::select(DB::raw('z_county, zipcode, z_state_code'))
        ->where('z_county', '<>', '')
        ->where('z_state_code', '=', $company->state)
        ->groupBy('z_county', 'zipcode', 'z_state_code')
        ->orderBy('z_county')
        ->orderBy('zipcode')
        ->orderBy('z_state_code')
        ->get()
        ->unique('z_county');

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


        return view('company.interstate.assignment', ['jct_to_stt' => $jct_to_stt,
        'jct_svc_mvsz' => $jct_svc_mvsz,
         'jct_fr_cnty' => $jct_fr_cnty,
           'company' => $company,
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

        $country_nm = Zip::where('zipcode', '=', $request->cnty_id)->select('z_county')->first();
        $find_all_zip = Zip::where('z_county',$country_nm->z_county)->select('zipcode')->get();
        if(sizeof($find_all_zip)>0)
        {
            foreach($find_all_zip as $items)
            {
                $jct_fr_cnty = jct_fr_cnty::where('cnty_id', '=', $items->id)->where('cmp_id',$request->cmp_id)->get();

                if (count($jct_fr_cnty) === 0) {
                    jct_fr_cnty::whereId($request->id)->create([
                        'cmp_id' => $request->cmp_id,
                        'cnty_id' => $items->zipcode,
                        'svc_id' => $request->svc_id
                    ]);
                }

            }
        }


        return response()->json(['success'=>'Data is successfully added']);
    }

    public function postcntyinterstaterem(Request $request)
    {

        $country_nm = Zip::where('id', '=', $request->cnty_id)->select('z_county')->first();
        $find_all_zip = Zip::where('z_county',$country_nm->COUNTY)->select('zipcode')->get();
        if(sizeof($find_all_zip)>0)
        {
            foreach($find_all_zip as $items)
            {
                jct_fr_cnty::where('cnty_id', '=', $items->zipcode)->where('cmp_id',$request->cmp_id)->delete();
            }
        }

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function posttostinterstate(Request $request)
    {
        $state_nm = Zip::where('zipcode', '=', $request->st_id)->select('z_state')->first();
        $find_all_zip = Zip::where('z_state',$state_nm->z_state)->select('zipcode')->get();
        if(sizeof($find_all_zip)>0)
        {
            foreach($find_all_zip as $items)
            {
        $jct_to_stt = jct_to_stt::where('st_id', '=', $items->zipcode)->where('cmp_id',$request->cmp_id)->get();

        if (count($jct_to_stt) === 0) {
            jct_to_stt::whereId($request->id)->create([
                'cmp_id' => $request->cmp_id,
                'st_id' => $items->zipcode,
                'svc_id' => $request->svc_id
            ]);
        }
            }
        }

        return response()->json(['success'=>'Data is successfully added']);
    }

    public function posttostinterstaterem(Request $request)
    {

        $state_nm = Zip::where('id', '=', $request->st_id)->select('STATE')->first();
        $find_all_zip = Zip::where('STATE',$state_nm->STATE)->select('id')->get();
        if(sizeof($find_all_zip)>0)
        {
            foreach($find_all_zip as $items)
            {
        jct_to_stt::where('st_id', '=', $items->id)->where('cmp_id',$request->cmp_id)->delete();
            }
        }
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function posttocntry(Request $request)
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

        jct_to_cntry::where('cntry_id', '=', $request->cntry_id)->delete();

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
        $roles = Role::all();

        return view('company.add', ['roles' => $roles]);
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
            'zip'    => 'required',
            'phonenumber'    => 'required',
            'description'    => 'required',
            'usdot'    => 'required',
            'mcno'    => 'required',
            'intrastate'    => 'required',
            'fleetsize'    => 'required',
            'email'         => 'required',
            'phonenumber' => 'required|numeric|digits:10',
            'status'       =>  'required|numeric|in:0,1',
        ]);

        DB::beginTransaction();
        try {

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
                'intrastate'    => $request->intrastate,
                'fleetsize'    => $request->fleetsize,
                'email'         => $request->email,
                'phonenumber' => $request->phonenumber,
                'status'       =>  $request->status,
            ]);

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



        return view('company.edit')->with([
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
        return view('companys.import');
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




    public function leadsinterstate($id)
    {

        $company = Company::findOrFail($id);

        $jct_cmp_ld = jct_cmp_ld::where('cmp_id', $id)
        ->get();

        $states = Zip::select('z_state_code as state_code', 'zipcode as id')
        ->where('z_state_code', '<>', '')
        ->groupBy('z_state_code', 'zipcode')
        ->orderBy('z_state_code')
        ->get('z_state_code', 'zipcode')
        ->unique('z_state_code');

        $counties = Zip::select(DB::raw('z_county as county, zipcode as id, z_state_code as state_code'))
        ->where('z_county', '<>', '')
        ->where('z_state_code', '=', 'CA')
        ->groupBy('z_county', 'zipcode', 'z_state_code')
        ->orderBy('z_county')
        ->orderBy('zipcode')
        ->orderBy('z_state_code')
        ->get()
        ->unique('z_county');


        $allowedstates = states::where('status', '1')
        ->get();

        foreach ($jct_cmp_ld as $l) {
            $instleads = inst::where('id', $l->frm_id)->get();
        }

        return view('company.interstate.leads', [
           'company' => $company,
           'id' => $id,
           'jct_cmp_ld' => $jct_cmp_ld,
           'states' => $states,
           'instleads' => $instleads,
             'allowedstates' => $allowedstates,
              'counties' => $counties]);
        }

}
