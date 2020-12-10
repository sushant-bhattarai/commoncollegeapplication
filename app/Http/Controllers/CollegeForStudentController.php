<?php

namespace App\Http\Controllers;

use App\College;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;

class CollegeForStudentController extends Controller
{
    public function showCollegeToStudent(College $colleges){
        $colleges = College::all();
        // return $colleges;
        return view('college.collegesList', compact('colleges'));
    }

    public function showSearchForm(){
        return view('college.search');
    }

    public function handleSearch(SearchRequest $request){
        $q = $request->input('q');
        // var_dump($q);
        if($q != ' '){
            $college = College::where('name','LIKE','%'.$q.'%')
                                ->orWhere('address','LIKE','%'.$q.'%')
                                ->get();
            if(count($college) > 0)
                return view('college.search')->withDetails($college)->withQuery ( $q );

            return view ('college.search')->withStatus('No colleges found. Try again!');
        }
    }
}