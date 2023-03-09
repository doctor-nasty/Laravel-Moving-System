<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    // View File To Upload Image
    public function index()
    {
        return view('image-form');
    }

    // Store Image
    public function storeImage(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->logo->extension();

        // Public Folder
        $request->logo->move(public_path('images/companies'), $imageName);

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store IMage in DB


        return back()->with('success', 'Image uploaded Successfully!')
        ->with('image', $imageName);
    }
}
