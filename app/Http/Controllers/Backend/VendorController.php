<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    //Shows the vendor dashboard
    public function dashboard(){
        // $data = [
        //     'listings'  =>  Listing::latest()->filter(request(['tag','search']))->paginate(4)
        // ];
        return view('vendor.dashboard');
    }
}
