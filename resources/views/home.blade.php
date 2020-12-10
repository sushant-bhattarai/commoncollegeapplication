@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <h2>Welcome, {{ Auth::user()->name }}!</h2> <hr>
                    Congratulations on taking this first step in the college application process! <br>
                    Here are some tips to get you started: <br>
                    <ul>
                        <li>This tab is your Dashboard. After you add a college to your list, you will see your application progress here.</li>
                        <li>All colleges will need you to answer the common questions under your <a href="">My Info</a> tab.</li>
                        <li>To search for a college, head over to the <a href="">College Search</a> tab.</li>
                        <li>Once you have added a college, you can complete and submit your application in the <a href="">My Colleges</a> tab.</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
