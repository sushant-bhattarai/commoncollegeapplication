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
                                        <button class="btn btn-success" onclick="handleApply({{$college->id}}, {{Auth::user()->id}})">Apply</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="POST" id="applyCollegeForm">
                            @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Apply to College</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <p class="text-center strong">Are you sure you want to apply to this college?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                                        <button type="submit" class="btn btn-success">Yes, Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <h5>No colleges added. Add now by clicking <a href="/available/colleges">here.</a></h5>
                @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function handleApply(application_id, user_id)
        {
            var form = document.getElementById('applyCollegeForm')
                form.action='/college/' + application_id + '/apply/' + user_id
            $('#deleteModal').modal('show')

        }
    
    </script>
@endsection
