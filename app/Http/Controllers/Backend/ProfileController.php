<?php

namespace App\Http\Controllers\Backend;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //dd($request->all());
        //dd($request->user());
        $formFields = $request->validate([
            'name'         =>  ['required', 'max:12'],
            'username'     =>  ['required', 'max:12'],
            'email'        =>  ['required','email',Rule::unique('users')->ignore(auth()->user())],
            'phone'        =>  'required'
        ]);
        
        $request->user()->update($formFields);
        return redirect()->back();
    }

   
}
