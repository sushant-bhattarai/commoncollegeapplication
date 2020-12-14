@extends('layouts.app')

@section('content')
<?php 
    $profile = App\Profile::find(Auth::user()->id);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Available Colleges</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($colleges as $college)
                                <tr>
                                    <td><a href="/college/{{$college->id}}/info">{{$college->name}}</a></td>
                                    <td>
                                        <a href="/college/{{$college->id}}/info"><button class="btn btn-info">Info</button></a>

                                            @foreach($profile->colleges as $myCollege) 
                                                @if($myCollege->name != $college->name)
                                                    <button class="btn btn-success" onclick="handleAdd({{$college->id}}, {{Auth::user()->id}})">Add to my College</button>
                                                @endif
                                            
                                            @endforeach
                                            
                                               
                                        <!-- <form  action="/college/{{$college->id}}/add/{{Auth::user()->id}}" method="post">
                                        @csrf
                                            <button type="submit" class="btn btn-success ml-4">Add to my College</button>
                                        </form> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="POST" id="addCollegeForm">
                            @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Add College</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <p class="text-center strong">Are you sure you want to add this college?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                                        <button type="submit" class="btn btn-success">Yes, Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function handleAdd(college_id, user_id)
        {
            var form = document.getElementById('addCollegeForm')
            form.action='/college/' + college_id + '/add/' + user_id
            $('#deleteModal').modal('show')

        }
    
    </script>
@endsection