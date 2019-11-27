<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        
        return view('users.index', ['users' => $users]);
    }

    public function form() {
        $groups = Group::all();

        return view('users.userForm', ['groups' => $groups]);
    }

    public function add(Request $request) {
        $user = new User();

        $user->avatar = Storage::putFile('avatars', new File($request->file('avatar')));
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->country = $request->country;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();

        $user->avatar = $request->avatar;
    }

    public function edit() {

    }

    public function delete() {

    }
}
