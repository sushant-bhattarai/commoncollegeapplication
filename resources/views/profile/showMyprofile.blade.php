@extends('layouts.app')

@section('content')
<?php  
    $arrayOfInterests = explode(',', $profile->interest);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                Profile : {{ Auth::user()->name }}
                <a class="ml-4" href="{{route('profile.edit', Auth::user()->id)}}"><button class="btn btn-primary">Edit your profile</button></a>
                </div>

                <div class="card-body">
                <div class="float-right mr-5">
                    <a target="_blank" href="/images/your_photos/{{$profile->your_photo}}">
                        <img src="/images/your_photos/{{$profile->your_photo}}" alt="{{$profile->your_photo}}"
                        style="border: 1px solid #ddd;
                                border-radius: 4px;
                                padding: 5px;
                                width: 150px;">
                    </a>
                </div>
                    <table class="table table-light">
                        <tbody>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Address</strong></td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>Gender</strong></td>
                                <td>{{ $profile->gender }}</td>
                            </tr>
                            <tr>
                                <td><strong>Address</strong></td>
                                <td>{{ $profile->address }}</td>
                            </tr>
                            <tr>
                                <td><strong>Date of Birth (A.D.)</strong></td>
                                <td>{{ $profile->dob }}</td>
                            </tr>
                            <tr>
                                <td><strong>Phone Number</strong></td>
                                <td>{{ $profile->phone_number }}</td>
                            </tr>
                            <tr>
                                <td><strong>School Name</strong></td>
                                <td>{{ $profile->school_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Your Interests of College Speciality</strong></td>
                                <td>
                                    <ul class="navbar-nav ml-auto">
                                    @foreach($arrayOfInterests as $interest)
                                        @if($interest != "Academic")
                                            <li class="nav-item">{{$interest}}</li>
                                        @endif
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Citizenship Front</strong></td>
                                <td><a target="_blank" href="/images/citizenship_fronts/{{$profile->citizenship_front}}">
                                        <img src="/images/citizenship_fronts/{{$profile->citizenship_front}}" alt="{{$profile->citizenship_front}}"
                                        style="border: 1px solid #ddd;
                                                border-radius: 4px;
                                                padding: 5px;
                                                width: 150px;">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Citizenship Back</strong></td>
                                <td><a target="_blank" href="/images/citizenship_back/{{$profile->citizenship_back}}">
                                        <img src="/images/citizenship_backs/{{$profile->citizenship_back}}" alt="{{$profile->citizenship_back}}"
                                        style="border: 1px solid #ddd;
                                                border-radius: 4px;
                                                padding: 5px;
                                                width: 150px;">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Marksheet Copy</strong></td>
                                <td><a target="_blank" href="/images/marksheet_photos/{{$profile->marksheet_photo}}">
                                        <img src="/images/marksheet_photos/{{$profile->marksheet_photo}}" alt="{{$profile->marksheet_photo}}"
                                        style="border: 1px solid #ddd;
                                                border-radius: 4px;
                                                padding: 5px;
                                                width: 150px;">
                                    </a>
                                </td>
                            </tr>
                            
                        </tbody>

                    </table><hr>
                    <p>
                        {{ $profile->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection