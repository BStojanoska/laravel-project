<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $avatar = 'avatar-' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();

        $user->avatar = Storage::putFileAs('/public/storage/avatars', $request->file('avatar'), $avatar);
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
