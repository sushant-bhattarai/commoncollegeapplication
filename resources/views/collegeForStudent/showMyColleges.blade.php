@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('My Colleges') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                @if(Auth::user()->has_added == 1)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>College Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profile->colleges as $college)
                                <tr>
                                    <td>
                                        {{$college->name}}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Apply</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h5>No colleges added. Add now by clicking <a href="/available/colleges">here.</a></h5>
                @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
