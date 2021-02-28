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
        // return $this->recommend($colleges);
        // return $colleges;
        return view('collegeForStudent.collegesList', compact('colleges'));
    }

    public function recommend(){
        $colleges = College::all();
        $profile = Profile::find(Auth::user()->id);
        if(Auth::user()->has_applied == 1){

            foreach($profile->applications as $college){
                // echo $college->pivot->priority."<br>";
                $priorityMat[$college->pivot->application_id][0]= $college->pivot->priority;
            }

            // return $priorityMat;
            // foreach($profile->applications as $college){
            //     // echo $college->pivot->priority."<br>";
            //     echo $priorityMat[$college->pivot->application_id][0]. " ";
            // }


            // Academic = 0, Sports = 1, ECA = 2, Leadership = 3
            // $collegeMat = array(array());
            foreach($colleges as $college){
                for($i=0; $i<1; $i++){
                    if($college->speciality == "Academic"){
                        $collegeMat[$college->id][$i]= 1;
                        $collegeMat[$college->id][$i+1]= 0;
                        $collegeMat[$college->id][$i+2]= 0;
                        $collegeMat[$college->id][$i+3]= 0;
                    }
                    if($college->speciality == "Sports"){
                        $collegeMat[$college->id][$i]= 0;
                        $collegeMat[$college->id][$i+1]= 1;
                        $collegeMat[$college->id][$i+2]= 0;
                        $collegeMat[$college->id][$i+3]= 0;

                    }
                    if($college->speciality == "ECA"){
                        $collegeMat[$college->id][$i]= 0;
                        $collegeMat[$college->id][$i+1]= 0;
                        $collegeMat[$college->id][$i+2]= 1;
                        $collegeMat[$college->id][$i+3]= 0;
                    }
                    if($college->speciality == "Leadership"){
                        $collegeMat[$college->id][$i]= 0;
                        $collegeMat[$college->id][$i+1]= 0;
                        $collegeMat[$college->id][$i+2]= 0;
                        $collegeMat[$college->id][$i+3]= 1;
                    }

                    if($college->speciality == "Academic,Sports"){
                        $collegeMat[$college->id][$i]= 1;
                        $collegeMat[$college->id][$i+1]= 1;
                        $collegeMat[$college->id][$i+2]= 0;
                        $collegeMat[$college->id][$i+3]= 0;
                    }
                    if($college->speciality == "Academic,ECA"){
                        $collegeMat[$college->id][$i]= 1;
                        $collegeMat[$college->id][$i+1]= 0;
                        $collegeMat[$college->id][$i+2]= 1;
                        $collegeMat[$college->id][$i+3]= 0;
                    }
                    if($college->speciality == "Academic,Leadership"){
                        $collegeMat[$college->id][$i]= 1;
                        $collegeMat[$college->id][$i+1]= 0;
                        $collegeMat[$college->id][$i+2]= 0;
                        $collegeMat[$college->id][$i+3]= 1;
                    }
                    if($college->speciality == "Sports,ECA"){
                        $collegeMat[$college->id][$i]= 0;
                        $collegeMat[$college->id][$i+1]= 1;
                        $collegeMat[$college->id][$i+2]= 1;
                        $collegeMat[$college->id][$i+3]= 0;
                    }
                    if($college->speciality == "Sports,Leadership"){
                        $collegeMat[$college->id][$i]= 0;
                        $collegeMat[$college->id][$i+1]= 1;
                        $collegeMat[$college->id][$i+2]= 0;
                        $collegeMat[$college->id][$i+3]= 1;
                    }
                    if($college->speciality == "ECA,Leadership"){
                        $collegeMat[$college->id][$i]= 0;
                        $collegeMat[$college->id][$i+1]= 0;
                        $collegeMat[$college->id][$i+2]= 1;
                        $collegeMat[$college]->id[$i+3]= 1;
                    }
                    if($college->speciality == "Academic,Sports,ECA"){
                        $collegeMat[$college->id][$i]= 1;
                        $collegeMat[$college->id][$i+1]= 1;
                        $collegeMat[$college->id][$i+2]= 1;
                        $collegeMat[$college->id][$i+3]= 0;
                    }
                    if($college->speciality == "Academic,Sports,Leadership"){
                        $collegeMat[$college->id][$i]= 1;
                        $collegeMat[$college->id][$i+1]= 1;
                        $collegeMat[$college->id][$i+2]= 0;
                        $collegeMat[$college->id][$i+3]= 1;
                    }
                    if($college->speciality == "Sports,ECA,Leadership"){
                        $collegeMat[$college->id][$i]= 0;
                        $collegeMat[$college->id][$i+1]= 1;
                        $collegeMat[$college->id][$i+2]= 1;
                        $collegeMat[$college->id][$i+3]= 1;
                    }
                    if($college->speciality == "Academic,ECA,Leadership"){
                        $collegeMat[$college->id][$i]= 1;
                        $collegeMat[$college->id][$i+1]= 0;
                        $collegeMat[$college->id][$i+2]= 1;
                        $collegeMat[$college->id][$i+3]= 1;
                    }
                    if($college->speciality == "Academic,Sports,ECA,Leadership"){
                        $collegeMat[$college->id][$i]= 1;
                        $collegeMat[$college->id][$i+1]= 1;
                        $collegeMat[$college->id][$i+2]= 1;
                        $collegeMat[$college->id][$i+3]= 1;
                    }
                }   
            }

            // var_dump ($collegeMat);
            
            // // //viewing output
            // foreach($colleges as $college){
            //     for($i=0; $i<4; $i++){
            //         echo $collegeMat[$college->id][$i] . " ";
            //     }
            //     echo "<br>";
            // }


            foreach($colleges as $allCollege){
                foreach($profile->applications as $appliedCollege){
                    if($appliedCollege->pivot->application_id == $allCollege->id){
                        $j = 0;
                        if($allCollege->speciality == "Academic"){
                            $weightedCollegeMat[$allCollege->id][$j]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+1]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+2]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+3]= 0;
                        }
                        if($allCollege->speciality == "Sports"){
                            $weightedCollegeMat[$allCollege->id][$j]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+1]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+2]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+3]= 0;
                        }
                        if($allCollege->speciality == "ECA"){
                            $weightedCollegeMat[$allCollege->id][$j]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+1]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+2]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+3]= 0;
                        }
                        if($allCollege->speciality == "Leadership"){
                            $weightedCollegeMat[$allCollege->id][$j]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+1]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+2]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+3]= $priorityMat[$allCollege->id][0];
                        }
                        if($allCollege->speciality == "Academic,Sports"){
                            $weightedCollegeMat[$allCollege->id][$j]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+1]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+2]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+3]= 0;
                        }
                        if($allCollege->speciality == "Academic,ECA"){
                            $weightedCollegeMat[$allCollege->id][$j]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+1]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+2]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+3]= 0;
                        }
                        if($allCollege->speciality == "Academic,Leadership"){
                            $weightedCollegeMat[$allCollege->id][$j]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+1]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+2]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+3]= $priorityMat[$allCollege->id][0];
                        }
                        if($allCollege->speciality == "Sports,ECA"){
                            $weightedCollegeMat[$allCollege->id][$j]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+1]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+2]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+3]= 0;
                        }
                        if($allCollege->speciality == "Sports,Leadership"){
                            $weightedCollegeMat[$allCollege->id][$j]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+1]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+2]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+3]= $priorityMat[$allCollege->id][0];
                        }
                        if($allCollege->speciality == "ECA,Leadership"){
                            $weightedCollegeMat[$allCollege->id][$j]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+1]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+2]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+3]= $priorityMat[$allCollege->id][0];
                        }
                        if($allCollege->speciality == "Academic,Sports,ECA"){
                            $weightedCollegeMat[$allCollege->id][$j]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+1]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+2]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+3]= 0;
                        }
                        if($allCollege->speciality == "Academic,Sports,Leadership"){
                            $weightedCollegeMat[$allCollege->id][$j]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+1]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+2]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+3]= $priorityMat[$allCollege->id][0];
                        }
                        if($allCollege->speciality == "Sports,ECA,Leadership"){
                            $weightedCollegeMat[$allCollege->id][$j]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+1]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+2]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+3]= $priorityMat[$allCollege->id][0];
                        }
                        if($allCollege->speciality == "Academic,ECA,Leadership"){
                            $weightedCollegeMat[$allCollege->id][$j]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+1]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+2]= $priorityMat[$allCollege->id][0];
                            $weightedCollegeMat[$allCollege->id][$j+3]= $priorityMat[$allCollege->id][0];
                        }
                        if($allCollege->speciality == "Academic,Sports,ECA,Leadership"){
                            $weightedCollegeMat[$allCollege->id][$j]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+1]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+2]= 0;
                            $weightedCollegeMat[$allCollege->id][$j+3]= $priorityMat[$allCollege->id][0];
                        }
                        
                    }
                }
            }
            // var_dump ($weightedCollegeMat);
            

            return " hello";
        }
        else{

        }
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
        $collegeCount = 5;
        $count = 0;
        $profile = Profile::find($profile_id);
        $application = Application::find($application_id);
        // return $application->id;
        foreach($profile->applications as $entity){
            // echo ($hello->pivot->application_id)."<br>";
            $count = $count + 1;
            // echo $count."<br>";
        }
        // return $count;
        $priority = $collegeCount - $count;
        // return $priority;
        $profile->applications()->attach($application, ['priority' => $priority]);  

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