@extends('layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row d-flex align-content-center justify-content-center py-5">
            <a href="{{route('addUserForm')}}"> <h4>Add New User</h4> </a>
        </div>
        <div class="row d-flex align-content-center justify-content-center no-wrap">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Zip</th>
                    <th scope="col">Country</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Group</th>
                    <th scope="col">Note</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i => $user)
                        <tr>
                            <th scope="row">{{$i + 1}}</th>
                            <td><img src="{{asset('storage/avatars/'.$user->avatar)}}" ></td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->city}}</td>
                            <td>{{$user->zip}}</td>
                            <td>{{$user->country}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                @foreach($user->groups->unique('name') as $group)
                                    {{$group->name}}
                                @endforeach
                            </td>
                            <td>{{Str::limit($user->note->note, 100)}}</td>
                            <td>
                                <a href="" >Edit</a>
                                <a href="" >Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection