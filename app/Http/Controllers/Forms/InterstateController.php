<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\inst;
use App\Models\jct_fr_cnty;
use App\Models\jct_to_stt;
use App\Models\jct_cmp_ld;

use App\Models\mvsz;
use App\Models\zipcodes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class InterstateController extends Controller
{
    public function createStepOne(Request $request)
    {
        $request->session()->forget('forms');
        $forms = $request->session()->get('forms');

        // $countries = \App\Models\Country::orderBy('country', 'asc')->get();

        // $continents = \App\Models\Country::orderBy('continent', 'asc')->get()->unique('continent');

        // $cars = \App\Models\Cars::orderBy('make','asc')->get();
        // $carsUnique = $cars->unique('make');

        return view('forms.interstate.index', compact('forms'));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepOne(Request $request)
    {

        $validatedData = $request->validate(
            [
                'inst_fr_zip' => 'required|numeric',
                'inst_to_zip' => 'required|numeric',
                'inst_dt' => 'required|date',
                'inst_sz_id' => 'required',
            ]
        );



        if (empty($request->session()->get('forms'))) {
            $forms = new inst();
            $forms->fill($validatedData);
            $request->session()->put('forms', $forms);
            $request->session()->put('cityfrom', $request->input('cityfrom'));
            $request->session()->put('cityto', $request->input('cityto'));

        } else {
            $forms = $request->session()->get('forms');
            $forms->fill($validatedData);
            $request->session()->put('forms', $forms);
            $request->session()->put('cityfrom', $request->input('cityfrom'));
            $request->session()->put('cityto', $request->input('cityto'));
        }

        return redirect()->route('interstateForm.create.step.two');
    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $forms = $request->session()->get('forms');

        return view('forms.interstate.steptwo', compact('forms'));
    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate(
            [
                'inst_fnm' => 'required|alpha',
                'inst_lnm' => 'required|alpha',
                'inst_email' => 'required|email',
                'inst_tel' => 'required|numeric|digits:10',
                'inst_tkn' => 'required|numeric'
            ]
        );


        // $forms->save();
        // $request->session()->forget('forms');

        $pin = $request->input('inst_tkn');
        $email = $request->input('inst_email');

        Mail::to($email)->send(new \App\Mail\VerifyEmail($pin));

        $forms = $request->session()->get('forms');
        $forms->fill($validatedData);
        $request->session()->put('forms', $forms);

        return redirect()->route('interstateForm.verify');
        // return view('partials.interstateformsubmit');
    }



    public function Verify(Request $request)
    {
        $forms = $request->session()->get('forms');
        $mvsz = mvsz::where('mvsz_id', '=', $forms->inst_sz_id)->get('mvsz_name')->implode('mvsz_name', ',');



        return view('forms.interstate.verify', compact('forms', 'mvsz'));
    }
    public function postVerify(Request $request)
    {
        $forms = $request->session()->get('forms');
        $token = $forms->inst_tkn;
        $cityfrom = session('cityfrom');
        $cityto = session('cityto');

        // $validatedData = $request->validate([
        //     'inst_tkn' => 'required'
        // ]);

        $pin2 = $request->input('pin');
        $mvsz = mvsz::where('mvsz_id', '=', $forms->inst_sz_id)->get('mvsz_name')->implode('mvsz_name', ',');


        if ($token == $pin2) {

            // $forms->fill($validatedData);
            // $forms->fill($pin2);
            $forms->email_verified_at = Carbon::now()->toDateTimeString();
            $request->session()->put('forms', $forms);

            $inst_fr_zip = $forms->inst_fr_zip;
            $inst_to_zip = $forms->inst_to_zip;
            $inst_dt = $forms->inst_dt;
            $cityfrom = session('cityfrom');
            $cityto = session('cityto');
            $forms->save();

            $mvsz = mvsz::where('mvsz_id', '=', $forms->inst_sz_id)->get('mvsz_name')->implode('mvsz_name', ',');


            $zip_fr_zip = zipcodes::where('zip',$inst_fr_zip)->select('id')->first();
            $zip_to_zip = zipcodes::Where('zip',$inst_to_zip)->select('id')->first();


            $jct_fr_cnty = jct_fr_cnty::where('cnty_id',$zip_fr_zip->id)->select('cmp_id')->get();

            $jct_to_stt = jct_to_stt::where('st_id',$zip_to_zip->id)->select('cmp_id')->get();

            $companies = Company::whereIn('id',$jct_fr_cnty)->whereIn('id',$jct_to_stt)->get();


            $test = "Variable Passed";


            foreach ($companies as $c) {
                Mail::to($c->email)->send(new \App\Mail\VerifyEmail($test));

                $record= new jct_cmp_ld();

                $record->cmp_id = $c->id;
                $record->svc_id = '1';
                $record->frm_id = $forms->id;

                $record->save();

            }


            $request->session()->forget('forms');

            return redirect()->route('interstatesubmit',['inst_fr_zip'=>$inst_fr_zip,'inst_to_zip'=>$inst_to_zip,'inst_dt'=>$inst_dt,'mvsz'=>$mvsz,'cityfrom'=>$cityfrom,'cityto'=>$cityto])->with('message','Submit');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Pin is incorrect']);
        }
    }

    public function submit(Request $request)
    {

        $inst_fr_zip = $request->inst_fr_zip;
        $inst_to_zip = $request->inst_to_zip;

        $zip_fr_zip = zipcodes::where('zip',$inst_fr_zip)->select('id')->first();
        $zip_to_zip = zipcodes::Where('zip',$inst_to_zip)->select('id')->first();


        $jct_fr_cnty = jct_fr_cnty::where('cnty_id',$zip_fr_zip->id)->select('cmp_id')->get();

        $jct_to_stt = jct_to_stt::where('st_id',$zip_to_zip->id)->select('cmp_id')->get();

        $companies = Company::whereIn('id',$jct_fr_cnty)->whereIn('id',$jct_to_stt)->get();

        $volt = Company::where('id', 1)->get();

        return view('forms.interstate.submit', compact('companies', 'volt'));
    }
}


