@extends('layouts.app')

@section('content')
<?php 
    $temp = 0;
?>
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
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th>College Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profile->colleges as $college)
                            <?php  $temp=0; ?>
                                <tr>
                                    <td>
                                    <a href="/college/{{$college->id}}/info">{{$college->name}}</a>
                                    </td>
                                    <td>
                                    <a href="/college/{{$college->id}}/info"><button class="btn btn-info">Info</button></a>
                                    @foreach($profile->applications as $myCollege)
                                        @if($college->name == $myCollege->name)
                                            <button class="btn btn-secondary">Applied</button>  
                                            <?php $temp = 1; ?>
                                            @break
                                        @endif      
                                    @endforeach

                                    @if($temp != 1)
                                        <button class="btn btn-success" onclick="handleApply({{$college->id}}, {{Auth::user()->id}})">Apply</button> 
                                    @endif
                                    <button class="btn btn-danger" onclick="handleDelete({{$college->id}}, {{Auth::user()->id}})">Delete</button> 
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
                                    <p class="text-center strong text-red">Are you sure you want to apply to this college? You cannot cancel the application.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                                        <button type="submit" class="btn btn-success">Yes, Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModalCollege" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="POST" id="deleteCollegeForm">
                            @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete College from My Colleges</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <p class="text-center strong text-red">Are you sure you want to delete this college from My Colleges?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
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
        
        function handleDelete(college_id, user_id)
        {
            var form = document.getElementById('deleteCollegeForm')
                form.action='/college/' + college_id + '/delete/' + user_id
            $('#deleteModalCollege').modal('show')

        }
    
    </script>
@endsection
