<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class StorageController extends Controller
{
    public function createStepOne(Request $request)
    {
        $request->session()->forget('forms');
        $forms = $request->session()->get('forms');


        return view('forms.storage.index',compact('forms'));
    }

    public function postCreateStepOne(Request $request)
    {

        $validatedData = $request->validate([
            'strg_zip' => 'required|numeric',
            'strg_sz_id' => 'required',
            'strg_dt' => 'required|date'
        ]);

        if(empty($request->session()->get('forms'))){
            $forms = new Storage();
            $forms->fill($validatedData);
            $request->session()->put('forms', $forms);
            $request->session()->put('storagezip', $request->input('storagezip'));
        }else{
            $forms = $request->session()->get('forms');
            $forms->fill($validatedData);
            $request->session()->put('forms', $forms);
            $request->session()->put('storagezip', $request->input('storagezip'));
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
        $forms = $request->session()->get('forms');

        return view('forms.storage.steptwo',compact('forms'));
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

         $forms = $request->session()->get('forms');
         $forms->fill($validatedData);
         $request->session()->put('forms', $forms);

         return redirect()->route('storageForm.verify');    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function Verify(Request $request)
    {
        $forms = $request->session()->get('forms');


        return view('forms.storage.verify',compact('forms'));
    }
    public function postVerify(Request $request)
    {
        $forms = $request->session()->get('forms');
        $token = $forms->strg_tkn;
        $storagezip = session('storagezip');

        // $validatedData = $request->validate([
        //     'pin' => 'required'
        // ]);

        $pin2 = $request->input('pin');


        if ($token == $pin2) {

        // $forms->fill($validatedData);
        // $forms->fill($pin2);
        $forms->email_verified_at = Carbon::now()->toDateTimeString();
        $request->session()->put('forms', $forms);

        return view('forms.storage.stepthree',compact('forms', 'storagezip'));
        } else {
            return redirect()->back()->withErrors(['msg' => 'Pin is incorrect']);
        }

    }
    public function createStepThree(Request $request)
    {
        $forms = $request->session()->get('forms');
        $storagezip = session('storagezip');


        return view('forms.storage.verify',compact('forms', 'storagezip'));
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

        return view('forms.storage.submit');
    }
}
