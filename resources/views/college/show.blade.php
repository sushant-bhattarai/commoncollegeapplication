@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Information of {{ $college->name }}</div>

                <div class="card-body">
                <a class="" href="{{route('college.create')}}">Add College</a>
                <a class="ml-5" href="{{route('college.index')}}">See Added Colleges</a><br><br>

                <table class="table">
                    <thead>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td>{{ $college->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Address</strong></td>
                            <td>{{ $college->address }}</td>
                        </tr>
                        <tr>
                            <td><strong>Contact Number</strong></td>
                            <td>{{ $college->phone_number }}</td>
                        </tr>
                        <tr>
                            <td><strong>No. of Seats</strong></td>
                            <td>{{ $college->no_of_seats }}</td>
                        </tr>
                        <tr>
                            <td><strong>Specialities</strong></td>
                            <td>
                                <?php  
                                    $arrayOfSpeciality = explode(',', $college->speciality);
                                ?>
                                <ul class="navbar-nav ml-auto">
                                @foreach($arrayOfSpeciality as $speciality)
                                    <li class="nav-item">{{$speciality}}</li>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                        
                    </thead>

                </table><hr>
                <p>
                    {{ $college->description }}
                </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection