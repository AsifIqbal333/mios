<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Shows the admin dashboard
    public function dashboard(){
        // $data = [
        //     'listings'  =>  Listing::latest()->filter(request(['tag','search']))->paginate(4)
        // ];
        return view('admin.dashboard');
    }

    //Shows the admin login form
    public function login(){
        return view('admin.auth.login');
    }
}
