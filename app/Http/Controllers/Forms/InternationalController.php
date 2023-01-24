<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\International;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class InternationalController extends Controller
{
    public function createStepOne(Request $request)
    {
        $request->session()->forget('forms');
        $forms = $request->session()->get('forms');

        return view('forms.international.index',compact('forms'));
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

        if(empty($request->session()->get('forms'))){
            $forms = new International();
            $forms->fill($validatedData);
            $request->session()->put('forms', $forms);
        }else{
            $forms = $request->session()->get('forms');
            $forms->fill($validatedData);
            $request->session()->put('forms', $forms);
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
        $forms = $request->session()->get('forms');

        return view('forms.international.steptwo',compact('forms'));
    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
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

         $forms = $request->session()->get('forms');
         $forms->fill($validatedData);
         $request->session()->put('forms', $forms);

         return redirect()->route('internationalForm.verify');
     }
    public function Verify(Request $request)
    {
        $forms = $request->session()->get('forms');


        return view('forms.international.verify',compact('forms'));
    }
    public function postVerify(Request $request)
    {
        $forms = $request->session()->get('forms');
        $token = $forms->intl_tkn;

        // $validatedData = $request->validate([
        //     'pin' => 'required'
        // ]);

        $pin2 = $request->input('pin');


        if ($token == $pin2) {

        // $forms->fill($validatedData);
        // $forms->fill($pin2);
        $forms->email_verified_at = Carbon::now()->toDateTimeString();
        $request->session()->put('forms', $forms);

        return view('forms.international.stepthree',compact('forms'));
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

        return view('forms.international.stepthree',compact('forms'));
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

        return view('forms.international.submit');
    }
}
