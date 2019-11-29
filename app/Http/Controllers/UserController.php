<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use App\Group;
use Illuminate\Http\File;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        
        return view('users.index', ['users' => $users]);
    }

    public function form() {
        return view('users.userForm');
    }

    public function add(Request $request) {
        $user = new User();
        if ($request->id) {
            $coll = User::where('id', $request->id)->get();
            $user = $coll[0];
        }

        if ($request->file('avatar')) {
            $avatar = 'avatar-' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            Storage::putFileAs('/public/avatars', new File($request->file('avatar')), $avatar);
            $user->avatar = $avatar;
        }
        
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->country = $request->country;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();

        $note = new Note();
        if ($request->id) {
            $note = $user->note;
        }
        $note->note = $request->note;
        $note->user_id = $user->id;
        $note->save();

        $user->groups()->sync($request->groups);

        return redirect()->route('users');
    }

    public function edit(Request $request, $id) {
        $decrypted = Crypt::decrypt($id);
        $user = User::where('id', $decrypted)->get();

        $groupIds = [];
        foreach ($user[0]->groups as $group) {
            $groupIds[] = $group->id;
        }

        $flattened = Arr::flatten($groupIds);

        return view('users.userForm', [
            'user' => $user[0],
            'groupIds' => $flattened
        ]);
    }

    public function delete(Request $request, $id) {
        $decrypted = Crypt::decrypt($id);
        $user = User::findOrFail($decrypted)->delete();

        return redirect()->route('users');
    }
}
