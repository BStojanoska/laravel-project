@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row d-flex align-content-center py-5">
            <a href="{{route('users')}}"> <h5><- Back</h5> </a>
        </div>
        <div class="row">
            <h2 class="text-center col-12">Add new user</h2>
            <form class="col-6 mx-auto py-3" method="POST" action="{{route('addUser')}}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" name="avatar" id="avatar">
                </div>
                <div class="form-group">
                    <label for="title">First Name</label>
                    <input type="firstname" class="form-control" name="firstname" id="firstname" aria-describedby="firstname">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="lastname">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" aria-describedby="address">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" id="city" aria-describedby="city">
                </div>
                <div class="form-group">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" name="zip" id="zip" aria-describedby="zip">
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" name="country" id="country" aria-describedby="country">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" aria-describedby="address">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone" aria-describedby="phone">
                </div>
                <textarea class="form-control" rows="10" id="note" name="note">Write Something
                </textarea>
                
                <div class="pt-3">Groups:</div>
                @foreach ($groups as $group)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="groups[]" id="{{$group->name}}" value="{{$group->id}}">
                        <label class="form-check-label" for="{{$group->name}}">{{$group->name}}</label>
                    </div>
                @endforeach
                    
                <button type="submit" class="btn btn-primary btn-block my-5">Submit</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection