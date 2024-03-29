<?php

namespace App\Http\Controllers;

use App\Models\carshp;
use App\Models\Company;
use App\Models\inst;
use App\Models\intl;
use App\Models\jct_svc_car;
use App\Models\jct_svc_mvsz;
use App\Models\jct_svc_strg;
use App\Models\mvsz;
use App\Models\payments;
use App\Models\strg;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inst = count(inst::get());
        $intl = count(intl::get());
        $carshp = count(carshp::get());
        $strg = count(strg::get());

        $totalleads = $inst + $intl + $carshp + $strg;

        $totalcompanies = count(Company::get());

        return view('admin.dashboard', compact('totalleads', 'totalcompanies'));
    }

    /**
     * User Profile
     * @param Nill
     * @return View Profile
     * @author Shani Singh
     */
    public function getProfile()
    {
        return view('profile');
    }

    /**
     * Update Profile
     * @param $profileData
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function updateProfile(Request $request)
    {
        #Validations
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number' => 'required|numeric|digits:10',
        ]);

        try {
            DB::beginTransaction();

            #Update Profile Data
            User::whereId(auth()->user()->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_number' => $request->mobile_number,
            ]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Profile Updated Successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Change Password
     * @param Old Password, New Password, Confirm New Password
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Password Changed Successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function mvszprice(Request $request)
    {

        $jct_svc_mvsz = jct_svc_mvsz::leftJoin('mvsz', 'jct_svc_mvsz.mvsz_id', 'mvsz.mvsz_id')
        ->leftJoin('company', 'jct_svc_mvsz.cmp_id', 'company.id')
        ->select('jct_svc_mvsz.id as id', 'jct_svc_mvsz.price as price', 'mvsz.mvsz_name as name', 'jct_svc_mvsz.svc_id as svc_id')
        ->get();

        $jct_svc_strg = jct_svc_strg::leftJoin('storage', 'jct_svc_strg.strg_id', 'storage.id')
        ->leftJoin('company', 'jct_svc_strg.cmp_id', 'company.id')
        ->select('jct_svc_strg.id as id', 'jct_svc_strg.price as price', 'storage.name as name', 'jct_svc_strg.svc_id as svc_id')
        ->get();

        $jct_svc_car = jct_svc_car::leftJoin('carprc', 'jct_svc_car.carprc_id', 'carprc.id')
        ->leftJoin('company', 'jct_svc_car.cmp_id', 'company.id')
        ->select('jct_svc_car.id as id', 'jct_svc_car.price as price', 'carprc.name as name', 'jct_svc_car.svc_id as svc_id')
        ->get();


        // return $jct_svc_strg;
        return view('admin.pages.mvszprice', compact('jct_svc_mvsz', 'jct_svc_strg', 'jct_svc_car'));
    }

    public function mvszupdateprice(Request $request)
    {
        $request->validate([
            'price'    => 'required|numeric'
        ]);

        $id = $request->input('id');

        // return $id;

        DB::beginTransaction();
        try {

            // Store Data
            $mvszprice = jct_svc_mvsz::query()
            ->where('id', $id)
            ->first()
            ->update([
              'price' => $request->input('price')
            ]);

            DB::commit();

            return redirect()->route('mvszprice')->with('success','Price Updated.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }


    }

    public function mvszupdatepricestrg(Request $request)
    {
        $request->validate([
            'price'    => 'required|numeric'
        ]);

        $id = $request->input('id');

        // return $id;

        DB::beginTransaction();
        try {

            // Store Data
            $mvszprice = jct_svc_strg::query()
            ->where('id', $id)
            ->first()
            ->update([
              'price' => $request->input('price')
            ]);

            DB::commit();

            return redirect()->back()->with('success','Price Updated.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }


    }
    public function mvszupdatepricecar(Request $request)
    {
        $request->validate([
            'price'    => 'required|numeric'
        ]);

        $id = $request->input('id');

        // return $id;

        DB::beginTransaction();
        try {

            // Store Data
            $mvszprice = jct_svc_car::query()
            ->where('id', $id)
            ->first()
            ->update([
              'price' => $request->input('price')
            ]);

            DB::commit();

            return redirect()->back()->with('success','Price Updated.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }


    }

    public function addpayment(Request $request)
    {
        $request->validate([
            'ld_qty'    => 'required|numeric',
            'tot_amnt'    => 'required|numeric',
            'cmp_id'    => 'required|numeric'
        ]);


        $payment = new payments;

        $payment->ld_qty = $request->ld_qty;
        $payment->tot_amnt = $request->tot_amnt;
        $payment->cmp_id = $request->cmp_id;

        $payment->save();

        return redirect()->back()->with('success','Payment Created.');

    }


}
