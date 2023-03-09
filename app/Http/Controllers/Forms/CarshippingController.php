<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Carshipping;
use App\Models\Company;
use App\Models\jct_cmp_ld;
use App\Models\jct_fr_cnty;
use App\Models\jct_to_stt;
use App\Models\zipcodes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CarshippingController extends Controller
{
    public function createStepOne(Request $request)
    {
        $request->session()->forget('formscar');
        $formscar = $request->session()->get('formscar');

        $cars = \App\Models\Cars::orderBy('make','asc')->get();
        $carsUnique = $cars->unique('make');

        return view('forms.carshipping.index',compact('formscar', 'carsUnique'));
    }

    public function postCreateStepOne(Request $request)
    {

        $validatedData = $request->validate([
            'carshp_fr_zip' => 'required|numeric',
            'carshp_to_zip' => 'required|numeric',
            'carshp_dt' => 'required|date',
            'carshp_vhmk' => 'required',
            'carshp_vhmdl' => 'required',
            'carshp_vhyr' => 'required'
        ]);

        if(empty($request->session()->get('formscar'))){
            $formscar = new Carshipping();
            $formscar->fill($validatedData);
            $request->session()->put('formscar', $formscar);
            $request->session()->put('cityfrom3', $request->input('cityfrom3'));
            $request->session()->put('cityto3', $request->input('cityto3'));

        }else{
            $formscar = $request->session()->get('formscar');
            $formscar->fill($validatedData);
            $request->session()->put('formscar', $formscar);
            $request->session()->put('cityfrom3', $request->input('cityfrom3'));
            $request->session()->put('cityto3', $request->input('cityto3'));

        }

        return redirect()->route('carForm.create.step.two');
    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $formscar = $request->session()->get('formscar');

        return view('forms.carshipping.steptwo',compact('formscar'));
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
                'carshp_fnm' => 'required|alpha',
                'carshp_lnm' => 'required|alpha',
                'carshp_email' => 'required|email',
                'carshp_tel' => 'required|numeric|digits:10',
                'carshp_tkn' => 'required|numeric'
                ]
            );

            $pin = $request->input('carshp_tkn');
            $email = $request->input('carshp_email');

         Mail::to($email)->send(new \App\Mail\VerifyEmail($pin));

         $formscar = $request->session()->get('formscar');
         $formscar->fill($validatedData);
         $request->session()->put('formscar', $formscar);

         return redirect()->route('carForm.verify');
     }
    public function Verify(Request $request)
    {
        $formscar = $request->session()->get('formscar');


        return view('forms.carshipping.verify',compact('formscar'));
    }
    public function postVerify(Request $request)
    {
        $formscar = $request->session()->get('formscar');
        $token = $formscar->carshp_tkn;
        $cityfrom = session('cityfrom3');
        $cityto = session('cityto3');

        // $validatedData = $request->validate([
        //     'pin' => 'required'
        // ]);

        $pin2 = $request->input('pin');


        if ($token == $pin2) {

            // $forms->fill($validatedData);
            // $forms->fill($pin2);
            $formscar->email_verified_at = Carbon::now()->toDateTimeString();
            $request->session()->put('forms', $formscar);

            $carshp_fr_zip = $formscar->carshp_fr_zip;
            $carshp_to_zip = $formscar->carshp_to_zip;
            $carshp_dt = $formscar->carshp_dt;
            $carshp_vhmk = $formscar->carshp_vhmk;
            $carshp_vhmdl = $formscar->carshp_vhmdl;
            $carshp_vhyr = $formscar->carshp_vhyr;
            $cityfrom = session('cityfrom');
            $cityto = session('cityto');
            $formscar->save();


            $zip_fr_zip = zipcodes::where('zip',$carshp_fr_zip)->select('id')->first();
            $zip_to_zip = zipcodes::Where('zip',$carshp_to_zip)->select('id')->first();


            $jct_fr_cnty = jct_fr_cnty::where('cnty_id',$zip_fr_zip->id)->select('cmp_id')->get();

            $jct_to_stt = jct_to_stt::where('st_id',$zip_to_zip->id)->select('cmp_id')->get();

            $companies = Company::whereIn('id',$jct_fr_cnty)->whereIn('id',$jct_to_stt)->get();


            $test = "Variable Passed";


            foreach ($companies as $c) {
                Mail::to($c->email)->send(new \App\Mail\VerifyEmail($test));

                $record= new jct_cmp_ld();

                $record->cmp_id = $c->id;
                $record->svc_id = '3';
                $record->frm_id = $formscar->id;

                $record->save();

            }


            $request->session()->forget('forms');

            return redirect()->route('carshippingsubmit',['carshp_vhmk'=>$carshp_vhmk,'carshp_vhmdl'=>$carshp_vhmdl,'carshp_vhyr'=>$carshp_vhyr,'carshp_fr_zip'=>$carshp_fr_zip,'carshp_to_zip'=>$carshp_to_zip,'carshp_dt'=>$carshp_dt,'cityfrom'=>$cityfrom,'cityto'=>$cityto])->with('message','Submit');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Pin is incorrect']);
        }
    }

    public function submit(Request $request)
    {

        $carshp_fr_zip = $request->carshp_fr_zip;
        $carshp_to_zip = $request->carshp_to_zip;
        $carshp_vhmk = $request->carshp_vhmk;
        $carshp_vhmdl = $request->carshp_vhmdl;
        $carshp_vhyr = $request->carshp_vhyr;


        $zip_fr_zip = zipcodes::where('zip',$carshp_fr_zip)->select('id')->first();
        $zip_to_zip = zipcodes::Where('zip',$carshp_to_zip)->select('id')->first();


        $jct_fr_cnty = jct_fr_cnty::where('cnty_id',$zip_fr_zip->id)->select('cmp_id')->get();

        $jct_to_stt = jct_to_stt::where('st_id',$zip_to_zip->id)->select('cmp_id')->get();

        $companies = Company::whereIn('id',$jct_fr_cnty)->whereIn('id',$jct_to_stt)->get();

        return view('forms.carshipping.submit', compact('companies'));
    }

}
