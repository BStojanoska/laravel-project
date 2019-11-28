@extends('layout.layout')
@section('content')
    <div class="container-fluid d-flex align-content-center justify-content-center" style="height: 100vh; width: 100vw;">
        <div class="row d-flex align-content-center justify-content-center no-wrap">
            <div class="col-6">
            <h1><a href="{{route('users')}}">Go to Users</a></h1>
            </div>
            <div class="col-6">
                <h1><a href="">Go to Groups</a></h1>
            </div>
        </div>
    </div>
@endsection