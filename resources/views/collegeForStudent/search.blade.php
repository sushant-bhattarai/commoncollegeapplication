@extends('layouts.app')

@section('content')
<?php 
    $temp = 0;
    $profile = App\Profile::find(Auth::user()->id);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Search Colleges</div>

                <div class="card-body">
                    <form action="/search" method="POST" role="search">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control @error('q') is-invalid @enderror" name="q"
                            placeholder="Search according to name or address"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary ml-2">
                                    <span class="glyphicon glyphicon-search">Search</span>
                                </button>
                            </span>
                            @error('q')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </form>

                    @if(isset($details))
                    <br>
                        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $college)
                                <?php  $temp=0; ?>
                                <tr>
                                    <td><a href="#">{{$college->name}}</a></td>
                                    <td>
                                        <a href="/college/{{$college->id}}/info"><button class="btn btn-info">Info</button></a>
                                        @foreach($profile->colleges as $myCollege)
                                                @if($college->name == $myCollege->name)
                                                    <button class="btn btn-secondary">Added</button>  
                                                    <?php $temp = 1; ?>
                                                    @break
                                                @endif      
                                            @endforeach

                                        @if($temp != 1)
                                            <button class="btn btn-success" onclick="handleAdd({{$college->id}}, {{Auth::user()->id}})">Add to my college</button> 
                                        @endif
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
                        
                    @elseif(isset($status))
                        <br>{{ $status }}
                    @endif

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

