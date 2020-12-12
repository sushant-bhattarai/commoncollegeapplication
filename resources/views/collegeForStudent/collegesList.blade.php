@extends('layouts.app')

@section('content')
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
                                        <a href="#"><button class="btn btn-success">Add to my College</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection