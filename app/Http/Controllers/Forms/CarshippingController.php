<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Carshipping;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CarshippingController extends Controller
{
    public function createStepOne(Request $request)
    {
        $request->session()->forget('forms');
        $forms = $request->session()->get('forms');

        $cars = \App\Models\Cars::orderBy('make','asc')->get();
        $carsUnique = $cars->unique('make');

        return view('forms.carshipping.index',compact('forms', 'carsUnique'));
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

        if(empty($request->session()->get('forms'))){
            $forms = new Carshipping();
            $forms->fill($validatedData);
            $request->session()->put('forms', $forms);
            $request->session()->put('cityfrom2', $request->input('cityfrom2'));
            $request->session()->put('cityto2', $request->input('cityto2'));

        }else{
            $forms = $request->session()->get('forms');
            $forms->fill($validatedData);
            $request->session()->put('forms', $forms);
            $request->session()->put('cityfrom2', $request->input('cityfrom2'));
            $request->session()->put('cityto2', $request->input('cityto2'));

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
        $forms = $request->session()->get('forms');

        return view('forms.carshipping.steptwo',compact('forms'));
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

         $forms = $request->session()->get('forms');
         $forms->fill($validatedData);
         $request->session()->put('forms', $forms);

         return redirect()->route('carForm.verify');
     }
    public function Verify(Request $request)
    {
        $forms = $request->session()->get('forms');


        return view('forms.carshipping.verify',compact('forms'));
    }
    public function postVerify(Request $request)
    {
        $forms = $request->session()->get('forms');
        $token = $forms->carshp_tkn;
        $cityfrom = session('cityfrom2');
        $cityto = session('cityto2');

        // $validatedData = $request->validate([
        //     'pin' => 'required'
        // ]);

        $pin2 = $request->input('pin');


        if ($token == $pin2) {

        // $forms->fill($validatedData);
        // $forms->fill($pin2);
        $forms->email_verified_at = Carbon::now()->toDateTimeString();
        $request->session()->put('forms', $forms);

        return view('forms.carshipping.stepthree',compact('forms', 'cityfrom', 'cityto'));
        } else {
            return redirect()->back()->withErrors(['msg' => 'Pin is incorrect']);
        }

    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepThree(Request $request)
    {
        $forms = $request->session()->get('forms');
        $cityfrom = session('cityfrom2');
        $cityto = session('cityto2');

        return view('forms.carshipping.stepthree',compact('forms', 'cityfrom', 'cityto'));
    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepThree(Request $request)
    {
        $forms = $request->session()->get('forms');
        $forms->save();

        $request->session()->forget('forms');

        return view('forms.carshipping.submit');
    }
}
