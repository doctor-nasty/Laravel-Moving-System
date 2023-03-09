<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\jct_cmp_ld;
use App\Models\jct_fr_cnty;
use App\Models\Storage;
use App\Models\strg;
use App\Models\zipcodes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class StorageController extends Controller
{
    public function createStepOne(Request $request)
    {
        $request->session()->forget('formsstrg');
        $formsstrg = $request->session()->get('formsstrg');


        return view('forms.storage.index',compact('formsstrg'));
    }

    public function postCreateStepOne(Request $request)
    {

        $validatedData = $request->validate([
            'strg_zip' => 'required|numeric',
            'strg_sz_id' => 'required',
            'strg_dt' => 'required|date'
        ]);

        if(empty($request->session()->get('formsstrg'))){
            $formsstrg = new strg();
            $formsstrg->fill($validatedData);
            $request->session()->put('formsstrg', $formsstrg);
            $request->session()->put('cityfrom', $request->input('cityfrom'));
        }else{
            $formsstrg = $request->session()->get('formsstrg');
            $formsstrg->fill($validatedData);
            $request->session()->put('formsstrg', $formsstrg);
            $request->session()->put('cityfrom', $request->input('cityfrom'));
        }

        return redirect()->route('storageForm.create.step.two');
    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $formsstrg = $request->session()->get('formsstrg');

        return view('forms.storage.steptwo',compact('formsstrg'));
    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'strg_fnm' => 'required|alpha',
            'strg_lnm' => 'required|alpha',
            'strg_email' => 'required|email',
            'strg_tel' => 'required|numeric|digits:10',
            'strg_tkn' => 'required|numeric'
            ]
        );

         $pin = $request->input('strg_tkn');
         $email = $request->input('strg_email');

         Mail::to($email)->send(new \App\Mail\VerifyEmail($pin));

         $formsstrg = $request->session()->get('formsstrg');
         $formsstrg->fill($validatedData);
         $request->session()->put('formsstrg', $formsstrg);

         return redirect()->route('storageForm.verify');    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function Verify(Request $request)
    {
        $formsstrg = $request->session()->get('formsstrg');
        $storage = storage::where('id', '=', $formsstrg->strg_sz_id)->get('name')->implode('name', ',');


        return view('forms.storage.verify',compact('formsstrg'));
    }
    public function postVerify(Request $request)
    {
        $formsstrg = $request->session()->get('formsstrg');
        $token = $formsstrg->strg_tkn;
        $cityfrom = session('cityfrom');

        // $validatedData = $request->validate([
        //     'pin' => 'required'
        // ]);

        $pin2 = $request->input('pin');


        if ($token == $pin2) {

            // $formsstrg->fill($validatedData);
            // $formsstrg->fill($pin2);
            $formsstrg->email_verified_at = Carbon::now()->toDateTimeString();
            $request->session()->put('formsstrg', $formsstrg);

            $strg_zip = $formsstrg->strg_zip;
            $strg_dt = $formsstrg->strg_dt;
            $cityfrom = session('cityfrom');
            $formsstrg->save();

            $storage = storage::where('id', '=', $formsstrg->strg_sz_id)->get('name')->implode('name', ',');


            $zip_fr_zip = zipcodes::where('zip',$strg_zip)->select('id')->first();


            $jct_fr_cnty = jct_fr_cnty::where('cnty_id',$zip_fr_zip->id)->select('cmp_id')->get();

            $companies = Company::whereIn('id',$jct_fr_cnty)->get();


            $test = "Variable Passed";


            foreach ($companies as $c) {
                Mail::to($c->email)->send(new \App\Mail\VerifyEmail($test));

                $record= new jct_cmp_ld();

                $record->cmp_id = $c->id;
                $record->svc_id = '4';
                $record->frm_id = $formsstrg->id;

                $record->save();

            }


            $request->session()->forget('formsstrg');

            return redirect()->route('storagesubmit',['strg_zip'=>$strg_zip,'strg_dt'=>$strg_dt,'storage'=>$storage,'cityfrom'=>$cityfrom])->with('message','Submit');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Pin is incorrect']);
        }

    }


    public function submit(Request $request)
    {

        $strg_zip = $request->strg_zip;


        $zip_fr_zip = zipcodes::where('zip',$strg_zip)->select('id')->first();


        $jct_fr_cnty = jct_fr_cnty::where('cnty_id',$zip_fr_zip->id)->select('cmp_id')->get();

        $companies = Company::whereIn('id',$jct_fr_cnty)->get();

        return view('forms.storage.submit', compact('companies'));
    }

}
