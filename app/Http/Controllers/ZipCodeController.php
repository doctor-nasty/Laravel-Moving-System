<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZipCodeController extends Controller
{
    public function index(Request $request)
    {
        $zipcodes = \App\Models\ZipCode::sortable()->orderBy('id','desc')->paginate(10);
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $zipcodes = \App\Models\ZipCode::sortable()
                ->where('ZIP', 'like', '%'.$filter.'%')
                ->paginate(20);
        } else {
            $zipcodes = \App\Models\ZipCode::sortable()
                ->paginate(20);
        }
        if (Auth::check()) {
            return view('pages.zip', ['authenticated' => true], ['zipcodes' => $zipcodes])->with('filter', $filter);
        } else {
            return view(abort(404), ['authenticated' => false]);
        }


        // return view('pages.zip', [
        //     'zipcodes' => $zipcodes
        // ]); 
    }





    public function edit()
    {
        return view('pages.noaccess');
    }
    
    public function destroy()
    {
        return view('pages.noaccess');

    }

    // public function search(Request $request){
    //     $search = $request->input('search');
    
    //     $posts = \App\Models\ZipCode::query()
    //         ->where('ZIP', 'LIKE', "%{$search}%")
    //         ->orWhere('body', 'LIKE', "%{$search}%")
    //         ->get();
    
    //     return view('search', compact('zipcodes'));
    // }

}
