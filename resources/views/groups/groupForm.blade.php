@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row d-flex align-content-center py-5">
            <a href="{{route('groups')}}"> <h5><- Back</h5> </a>
        </div>
        <div class="row">
            <h2 class="text-center col-12">{{isset($group)?'Edit':'Add new'}} group</h2>
            <form class="col-6 mx-auto py-3" method="POST" action="{{route('addGroup')}}" enctype="multipart/form-data">
                <input type="hidden" name="id" value={{$group->id ?? ''}} />

                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="name" class="form-control" name="name" id="name" aria-describedby="name" value="{{$group->name ?? ''}}">
                </div>
                    
                <button type="submit" class="btn btn-primary btn-block my-5">Submit</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection