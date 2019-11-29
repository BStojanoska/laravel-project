@extends('layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row d-flex align-content-center justify-content-center py-5">
            <a href="{{route('addGroupForm')}}"> <h4>Add New Group</h4> </a>
        </div>
        <div class="row d-flex align-content-center justify-content-center no-wrap">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Group</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($groups as $i => $group)
                        <tr>
                            <th scope="row">{{$i + 1}}</th>
                            <td>{{$group->name}}</td>
                            <td>
                                <a href="{{route('editGroup', Crypt::encrypt($group->id))}}" >Edit</a>
                                <a href="{{route('deleteGroup', Crypt::encrypt($group->id))}}" >Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection