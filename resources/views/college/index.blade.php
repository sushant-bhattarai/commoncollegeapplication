@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Added Colleges</div>

                <div class="card-body">
                <a class="" href="{{route('college.create')}}">Add College</a><br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>College Name</td>
                                <td>Options</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($colleges as $college)
                                <tr>
                                    <td><a href="{{route('college.show', $college->id) }}">{{ $college->name }}</a></td>
                                    <td>
                                        <a href="{{route('college.show', $college->id) }}"><button class="btn btn-sm btn-primary">Info</button></a>
                                        <a href=""><button class="btn btn-sm btn-secondary">Edit</button></a>
                                        <a href=""><button class="btn btn-sm btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection