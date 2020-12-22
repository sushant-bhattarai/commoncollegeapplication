<?php

namespace App\Http\Controllers;

use App\User;
use App\College;
use App\Profile;
use App\Application;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Auth;

class CollegeForStudentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('adminMiddleware');
        $this->middleware('fillProfileForm');
        $this->middleware('myCollege')->only('showMyColleges');
    }

    public function showCollegeToStudent(College $colleges){
        $colleges = College::all();
        // return $colleges;
        return view('collegeForStudent.collegesList', compact('colleges'));
    }

    public function showSearchForm(){
        return view('collegeForStudent.search');
    }

    public function handleSearch(SearchRequest $request){
        $q = $request->input('q');
        // var_dump($q);
        if($q != ' '){
            $college = College::where('name','LIKE','%'.$q.'%')
                                ->orWhere('address','LIKE','%'.$q.'%')
                                ->get();
            if(count($college) > 0)
                return view('collegeForStudent.search')->withDetails($college)->withQuery ( $q );

            return view ('collegeForStudent.search')->withStatus('No colleges found. Try again!');
        }
    }

    public function showCollegeInfo($college_id){
        $college = College::find($college_id);
        return view('collegeForStudent.showCollegeInfo', compact('college'));
    }

    public function addCollege($college_id, $profile_id){
        // return $college_id;

        $profile = Profile::find($profile_id);
        $college = College::find($college_id);

        $profile->colleges()->attach($college);
        
        $user  = User::findOrFail(Auth::user()->id);
        $user->has_added = 1;
        $user->save();
        return redirect()->route('myCollege', Auth::user()->id)->withStatus('College added to My Colleges!');
    }

    public function applyCollege($application_id, $profile_id){
        // return $application_id;

        $profile = Profile::find($profile_id);
        $application = Application::find($application_id);
        // return $application;

        $profile->applications()->attach($application);
        
        $user  = User::findOrFail(Auth::user()->id);
        $user->has_applied = 1;
        $user->save();

        return redirect('/home')->withStatus('You have applied to the college successfully.');
    }

    public function showMyColleges($profile_id){
        $profile = Profile::find($profile_id);
        return view('collegeForStudent.showMyColleges', compact('profile'));
    }

    public function deleteFromMyCollege($college_id, $profile_id){
        // return $college_id;

        $profile = Profile::find($profile_id);
        $college = College::find($college_id);
        // return $profile->colleges()->count();

        $user  = User::findOrFail(Auth::user()->id);
        if($profile->colleges()->count() == 1){
            $user->has_added = NULL;
            $user->save();
        }
        $profile->colleges()->detach($college);
        return redirect()->route('myCollege', Auth::user()->id)->withStatus('College deleted from My Colleges!');
    }

    public function showApplicationForm($college_id, $profile_id){

    }
    
}