<?php

namespace App\Http\Controllers;

use App\Models\carshp;
use App\Models\company;
use App\Models\inst;
use App\Models\intl;
use App\Models\jct_cmp_ld;
use App\Models\strg;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadsController extends Controller
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

    public function leads($id)
    {

        $company = Company::findOrFail($id);

        $inst = inst::query()->select('inst.id as inst_id', 'inst.inst_fnm', 'inst.inst_lnm', 'inst.inst_tel', 'inst.inst_email', 'jct_cmp_ld.created_at as inst_created_at', 'jct_cmp_ld.svc_id')->leftJoin('jct_cmp_ld', 'jct_cmp_ld.frm_id', '=', 'inst.id')->where('jct_cmp_ld.cmp_id', $id)->get();
        $intl = intl::query()->select('intl.id as intl_id', 'intl.intl_fnm', 'intl.intl_lnm', 'intl.intl_tel', 'intl.intl_email', 'jct_cmp_ld.created_at as intl_created_at', 'jct_cmp_ld.svc_id')->leftJoin('jct_cmp_ld', 'jct_cmp_ld.frm_id', '=', 'intl.id')->where('jct_cmp_ld.cmp_id', $id)->get();
        $carshp = carshp::query()->select('carshp.id as carshp_id', 'carshp.carshp_fnm', 'carshp.carshp_lnm', 'carshp.carshp_tel', 'carshp.carshp_email', 'jct_cmp_ld.created_at as carshp_created_at', 'jct_cmp_ld.svc_id')->leftJoin('jct_cmp_ld', 'jct_cmp_ld.frm_id', '=', 'carshp.id')->where('jct_cmp_ld.cmp_id', $id)->get();
        $strg = strg::query()->select('strg.id as strg_id', 'strg.strg_fnm', 'strg.strg_lnm', 'strg.strg_tel', 'strg.strg_email', 'jct_cmp_ld.created_at as strg_created_at', 'jct_cmp_ld.svc_id')->leftJoin('jct_cmp_ld', 'jct_cmp_ld.frm_id', '=', 'strg.id')->where('jct_cmp_ld.cmp_id', $id)->get();

        $leads = collect($inst)->merge($intl)->merge($carshp)->merge($strg)->sortBy('svc_id');

        // return $leads;

    return view('admin.company.leads', [
       'company' => $company,
       'id' => $id,
       'leads' => $leads]);
    }

    public function search(Request $request, Company $id)
    {

        $company = Company::findOrFail($id);

        // Get the search value from the request
        $datefrom = $request->input('datefrom');
        $dateto = $request->input('dateto');
        $cmp_id = $request->input('cmp_id');

        $inst = inst::query()->select('inst.id as inst_id', 'inst.inst_fnm', 'inst.inst_lnm', 'inst.inst_tel', 'inst.inst_email', 'jct_cmp_ld.created_at as inst_created_at', 'jct_cmp_ld.svc_id')->leftJoin('jct_cmp_ld', 'jct_cmp_ld.frm_id', '=', 'inst.id')->where('jct_cmp_ld.cmp_id', $cmp_id)->where('inst_created_at', '>=', $datefrom)->where('inst_created_at', '<=', $dateto)->get();
        $intl = intl::query()->select('intl.id as intl_id', 'intl.intl_fnm', 'intl.intl_lnm', 'intl.intl_tel', 'intl.intl_email', 'jct_cmp_ld.created_at as intl_created_at', 'jct_cmp_ld.svc_id')->leftJoin('jct_cmp_ld', 'jct_cmp_ld.frm_id', '=', 'intl.id')->where('jct_cmp_ld.cmp_id', $cmp_id)->where('inst_created_at', '>=', $datefrom)->where('inst_created_at', '<=', $dateto)->get();
        $carshp = carshp::query()->select('carshp.id as carshp_id', 'carshp.carshp_fnm', 'carshp.carshp_lnm', 'carshp.carshp_tel', 'carshp.carshp_email', 'jct_cmp_ld.created_at as carshp_created_at', 'jct_cmp_ld.svc_id')->leftJoin('jct_cmp_ld', 'jct_cmp_ld.frm_id', '=', 'carshp.id')->where('jct_cmp_ld.cmp_id', $cmp_id)->where('inst_created_at', '>=', $datefrom)->where('inst_created_at', '<=', $dateto)->get();
        $strg = strg::query()->select('strg.id as strg_id', 'strg.strg_fnm', 'strg.strg_lnm', 'strg.strg_tel', 'strg.strg_email', 'jct_cmp_ld.created_at as strg_created_at', 'jct_cmp_ld.svc_id')->leftJoin('jct_cmp_ld', 'jct_cmp_ld.frm_id', '=', 'strg.id')->where('jct_cmp_ld.cmp_id', $cmp_id)->where('inst_created_at', '>=', $datefrom)->where('inst_created_at', '<=', $dateto)->get();

        $leads = collect($inst)->merge($intl)->merge($carshp)->merge($strg)->sortBy('svc_id');


        // Return the search view with the resluts compacted
        return view('admin.company.interstate.searchleads', compact('leads'));
    }
}
