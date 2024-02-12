<?php

namespace App\Http\Controllers\Backend;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
            'phone'        =>  'required',
            'profileImage' =>  ['image', 'max:2048'],
        ]);
        
        if($request->hasFile('profileImage')){

            /*Delete old admin profile image*/
            $oldImage = Auth::user()->image;
            if(File::exists(public_path($oldImage))){
                File::delete(public_path($oldImage));
            }
            
            $profileImage = $request->profileImage;
            $imageName = rand() . '_' . $profileImage->getClientOriginalName();
            $profileImage->move(public_path('uploads'),$imageName);
            $imageName = '/uploads/'.$imageName;
            $formFields['image'] = $imageName;

        }

        $request->user()->update($formFields);

        return redirect()->back();
    }

   
}
