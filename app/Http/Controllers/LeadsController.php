<?php

namespace App\Http\Controllers;


use App\Models\company;
use App\Models\inst;
use Illuminate\Http\Request;

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

        $jct_cmp_ld = inst::get()->toArray();

        return $jct_cmp_ld;
    }

    // return view('admin.company.interstate.leads', [
    //    'company' => $company,
    //    'id' => $id,
    //    'jct_cmp_ld' => $jct_cmp_ld]);
    // }

    public function search(Request $request)
    {
        // Get the search value from the request
        $datefrom = $request->input('datefrom');
        $dateto = $request->input('dateto');

        // Search in the title and body columns from the posts table
        $inst = inst::query()
            ->where('created_at', 'LIKE', "%{$datefrom}%")
            ->orWhere('created_at', 'LIKE', "%{$dateto}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('admin.company.interstate.searchleads', compact('inst'));
    }
}
