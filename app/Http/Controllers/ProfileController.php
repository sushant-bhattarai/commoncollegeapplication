<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ImageEditRequest;
use App\Http\Requests\ImageUploadRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageUploadRequest $request)
    {
        
        $profile = new Profile();
        
        $profile->id = Auth::user()->id;
        $profile->gender = $request->gender;
        $profile->address = $request->address;
        $profile->dob = $request->dob;
        $profile->phone_number = $request->phone_number;
        $profile->school_name = $request->school_name;
        // $profile->user_id = User::find(1)->id;
        $profile->user_id = Auth::user()->id;



        //your_photo upload
        $myArray =explode('@', Auth::user()->email);
        $your_photo = 'your_photo_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->your_photo->getClientOriginalExtension();
        $request->your_photo->move(public_path('/images/your_photos'), $your_photo);
        $profile->your_photo = $your_photo;

        //citizenship_photo upload
        $citizenship_photo = 'citizenship_photo_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->citizenship_photo->getClientOriginalExtension();
        $request->citizenship_photo->move(public_path('/images/citizenship_photos'), $citizenship_photo);
        $profile->citizenship_photo = $citizenship_photo;

        //marksheet_photo upload
        $marksheet_photo = 'marksheet_photo_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->marksheet_photo->getClientOriginalExtension();
        $request->marksheet_photo->move(public_path('/images/marksheet_photos'), $marksheet_photo);
        $profile->marksheet_photo = $marksheet_photo;

        //saving interests by implode function:
        if($request->has('interest')){
            $stringOfInterest = implode(',', $request->input('interest'));
            $profile->interest = $stringOfInterest;
        }
        else{
            $profile->interest = "Academic";
        }
        
        //saving interests
        // $input = $request->all();
        // $input['interest'] = $request->input('interest');
        // $profile->interest = $input['interest'];
        

        $profile->save();
    
        $user  = User::findOrFail(Auth::user()->id);
        $user->profile_id = Auth::user()->id;
        $user->save();

        return redirect()->route('home')->withStatus('Profile info added!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        // return $profile;
        $user = User::find(Auth::user()->id);
        // return $user;
        return view('profile.edit', compact('profile', 'user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageEditRequest $request, $id)
    {
        $profile = Profile::find($id);

        $profile->id = Auth::user()->id;
        $profile->gender = $request->gender;
        $profile->address = $request->address;
        $profile->dob = $request->dob;
        $profile->phone_number = $request->phone_number;
        $profile->school_name = $request->school_name;
        $profile->user_id = Auth::user()->id;


        $myArray =explode('@', Auth::user()->email);

        //your_photo upload
        if($request->has('your_photo')){
            $your_photo = 'your_photo_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->your_photo->getClientOriginalExtension();
            $request->your_photo->move(public_path('/images/your_photos'), $your_photo);
            $profile->your_photo = $your_photo;
        }

        //citizenship_photo upload
        if($request->has('citizenship_photo')){
            $citizenship_photo = 'citizenship_photo_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->citizenship_photo->getClientOriginalExtension();
            $request->citizenship_photo->move(public_path('/images/citizenship_photos'), $citizenship_photo);
            $profile->citizenship_photo = $citizenship_photo;
        }

        //marksheet_photo upload
        if($request->has('marksheet_photo')){
            $marksheet_photo = 'marksheet_photo_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->marksheet_photo->getClientOriginalExtension();
            $request->marksheet_photo->move(public_path('/images/marksheet_photos'), $marksheet_photo);
            $profile->marksheet_photo = $marksheet_photo;
        }

        //saving interests by implode function:
        if($request->has('interest')){
            $stringOfInterest = implode(',', $request->input('interest'));
            $profile->interest = $stringOfInterest;
        }
        else{
            $profile->interest = "Academic";
        }


        //saving interests
        // $input = $request->all();
        // $input['interest'] = $request->input('interest');
        // $profile->interest = $input['interest'];
        

        $profile->save();

        return redirect()->route('home')->withStatus('Profile info updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
