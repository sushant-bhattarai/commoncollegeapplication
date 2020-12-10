@extends('layouts.app')

@section('content')
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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $college)
                                <tr>
                                    <td><a href="#">{{$college->name}}</a></td>
                                    <td>
                                        <a href="#"><button class="btn btn-info">Info</button></a>
                                        <a href="#"><button class="btn btn-success">Add to my College</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @elseif(isset($status))
                        <br>{{ $status }}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection