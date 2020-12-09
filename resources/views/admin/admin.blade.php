@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <a href="{{ route('college.create') }}">Add College</a><br><br>
                    <a href="{{ route('college.index') }}">View added Colleges</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection