<?php

namespace App\Http\Controllers;

use App\College;
use Illuminate\Http\Request;
use App\Http\Requests\CollegeRequest;

class CollegeForAdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('studentMiddleware');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::all();
        return view('collegeForAdmin.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collegeForAdmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollegeRequest $request)
    {
        $college = new College();

        $college->name = $request->name;
        $college->address = $request->address;
        $college->phone_number = $request->phone_number;
        $college->no_of_seats = $request->no_of_seats;
        $college->description = $request->description;

        //saving specialities
        $stringOfSpeciality = implode(',', $request->input('speciality'));
        $college->speciality = $stringOfSpeciality;
        
        $college->save();
        return redirect()->route('adminHome')->withStatus('College added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\College  $college
     * @return \Illuminate\Http\Response
     */
    public function show(College $college)
    {
        // return $college;
        return view('collegeForAdmin.show', compact('college'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\College  $college
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $college = College::find($id);
        return view('collegeForAdmin.edit', compact('college'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\College  $college
     * @return \Illuminate\Http\Response
     */
    public function update(CollegeRequest $request, $id)
    {
        $college = College::find($id);

        $college->name = $request->name;
        $college->address = $request->address;
        $college->phone_number = $request->phone_number;
        $college->no_of_seats = $request->no_of_seats;
        $college->description = $request->description;

        //saving specialities
        $stringOfSpeciality = implode(',', $request->input('speciality'));
        $college->speciality = $stringOfSpeciality;
        
        $college->save();
        return redirect()->route('adminHome')->withStatus('College updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\College  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = College::find($id);
        $college -> delete();
        return redirect()->route('adminHome')->withStatus('College deleted!');
    }
}
