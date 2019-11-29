<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GroupController extends Controller
{
    public function index() {
        $groups = Group::all();
        
        return view('groups.index', ['groups' => $groups]);
    }

    public function form() {
        return view('groups.groupForm');
    }

    public function add(Request $request) {
        $group = new Group();
        if ($request->id && is_numeric($request->id)) {
            $coll = Group::where('id', $request->id)->get();
            $group = $coll[0];
        }

        $group->name = $request->name;
        
        $group->save();

        return redirect()->route('groups');
    }

    public function edit(Request $request, $id) {
        $decrypted = Crypt::decrypt($id);
        $group = Group::where('id', $decrypted)->get();


        return view('groups.groupForm', [
            'group' => $group[0]
        ]);
    }

    public function delete(Request $request, $id) {
        $decrypted = Crypt::decrypt($id);
        $group = Group::findOrFail($decrypted)->delete();

        return redirect()->route('groups');
    }
}
