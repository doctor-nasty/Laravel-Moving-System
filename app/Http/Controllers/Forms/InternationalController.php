<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Country;
use App\Models\International;
use App\Models\jct_cmp_ld;
use App\Models\jct_fr_cnty;
use App\Models\jct_to_cntry;
use App\Models\mvsz;
use App\Models\zipcodes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class InternationalController extends Controller
{
    public function createStepOne(Request $request)
    {
        $request->session()->forget('formsintl');
        $formsintl = $request->session()->get('formsintl');

        return view('forms.international.index', compact('formsintl'));
    }

    public function postCreateStepOne(Request $request)
    {

        $validatedData = $request->validate([
            'intl_fr_zip' => 'required|numeric',
            'intl_to_cntr' => 'required',
            'intl_to_cont' => 'required',
            'intl_dt' => 'required|date',
            'intl_sz_id' => 'required'
        ]);

        if (empty($request->session()->get('formsintl'))) {
            $formsintl = new International();
            $formsintl->fill($validatedData);
            $request->session()->put('formsintl', $formsintl);
            $request->session()->put('cityfrom', $request->input('cityfrom'));
        } else {
            $formsintl = $request->session()->get('formsintl');
            $formsintl->fill($validatedData);
            $request->session()->put('formsintl', $formsintl);
            $request->session()->put('cityfrom', $request->input('cityfrom'));
        }
        return redirect()->route('internationalForm.create.step.two');
    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $formsintl = $request->session()->get('formsintl');

        return view('forms.international.steptwo', compact('formsintl'));
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
                'intl_fnm' => 'required|alpha',
                'intl_lnm' => 'required|alpha',
                'intl_email' => 'required|email',
                'intl_tel' => 'required|numeric|digits:10',
                'intl_tkn' => 'required|numeric'
            ]
        );

        $pin = $request->input('intl_tkn');
        $email = $request->input('intl_email');

        Mail::to($email)->send(new \App\Mail\VerifyEmail($pin));

        $formsintl = $request->session()->get('formsintl');
        $formsintl->fill($validatedData);
        $request->session()->put('formsintl', $formsintl);

        return redirect()->route('internationalForm.verify');
    }
    public function Verify(Request $request)
    {
        $formsintl = $request->session()->get('formsintl');
        $mvsz = mvsz::where('mvsz_id', '=', $formsintl->intl_sz_id)->get('mvsz_name')->implode('mvsz_name', ',');


        return view('forms.international.verify', compact('formsintl'));
    }
    public function postVerify(Request $request)
    {
        $formsintl = $request->session()->get('formsintl');
        $token = $formsintl->intl_tkn;
        $cityfrom = session('cityfrom');

        // $validatedData = $request->validate([
        //     'pin' => 'required'
        // ]);

        $pin2 = $request->input('pin');



        if ($token == $pin2) {

            // $formsintl->fill($validatedData);
            // $formsintl->fill($pin2);
            $formsintl->email_verified_at = Carbon::now()->toDateTimeString();
            $request->session()->put('formsintl', $formsintl);

            $intl_fr_zip = $formsintl->intl_fr_zip;
            $intl_to_cntr = $formsintl->intl_to_cntr;
            $intl_to_cont = $formsintl->intl_to_cont;
            $intl_dt = $formsintl->intl_dt;
            $cityfrom = session('cityfrom');
            $formsintl->save();

            $mvsz = mvsz::where('mvsz_id', '=', $formsintl->intl_sz_id)->get('mvsz_name')->implode('mvsz_name', ',');


            $zip_fr_zip = zipcodes::where('zip',$intl_fr_zip)->select('id')->first();
            $zip_to_zip = Country::where('country',$intl_to_cntr)->select('id')->first();


            $jct_fr_cnty = jct_fr_cnty::where('cnty_id',$zip_fr_zip->id)->select('cmp_id')->get();

            $jct_to_cntry = jct_to_cntry::where('cntry_id',$zip_to_zip->id)->select('cmp_id')->get();

            $companies = Company::whereIn('id',$jct_fr_cnty)->whereIn('id',$jct_to_cntry)->get();

            // $companies = Company::get();


            $test = "Variable Passed";


            foreach ($companies as $c) {
                Mail::to($c->email)->send(new \App\Mail\VerifyEmail($test));

                $record= new jct_cmp_ld();

                $record->cmp_id = $c->id;
                $record->svc_id = '2';
                $record->frm_id = $formsintl->id;

                $record->save();

            }


            $request->session()->forget('formsintl');

            return redirect()->route('internationalsubmit',['intl_fr_zip'=>$intl_fr_zip,'intl_to_cntr'=>$intl_to_cntr,'intl_dt'=>$intl_dt,'mvsz'=>$mvsz,'cityfrom'=>$cityfrom,'intl_to_cont'=>$intl_to_cont])->with('message','Submit');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Pin is incorrect']);
        }
    }
    public function submit(Request $request)
    {

        $intl_fr_zip = $request->intl_fr_zip;
        $intl_to_cntr = $request->intl_to_cntr;
        $intl_to_cont = $request->intl_to_cont;

        $zip_fr_zip = zipcodes::where('zip',$intl_fr_zip)->select('id')->first();
        $zip_to_zip = Country::Where('country', 'LIKE', $intl_to_cntr.'%')->select('id')->first();


        $jct_fr_cnty = jct_fr_cnty::where('cnty_id',$zip_fr_zip->id)->select('cmp_id')->get();

        $jct_to_cntry = jct_to_cntry::where('cntry_id',$zip_to_zip->id)->select('cmp_id')->get();

        $companies = Company::whereIn('id',$jct_fr_cnty)->whereIn('id',$jct_to_cntry)->get();

        // $companies = Company::get();

        // return $jct_to_cntry;
        return view('forms.international.submit', compact('companies'));
    }
}
