<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return to_route('user.index')->with('success', 'The Permission Successfully Created');
        } catch (Exception $e) {
            return to_route('user.index')->with('error', $e->getMessage());
        }
    }
    function edit($id)
    {
        $this->authorize('view_post');

        $data['user'] = User::findOrFail($id);
        $data['roles'] = Role::all();
        return view("user.edit", $data);
    }

    function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
        ];
        $request->validate($rules);
        // return $request->all();
        try {
            $user = User::find($id);
            $user->roles()->sync($request->roles);
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'user_id' => auth()->id()
                // 'password' => $request->password,
            ]);
            if ($request->ajax()) {
                return response()->json([
                    'status' => 1,
                    'message' => 'The user is successfully updated'
                ]);
            } else {
                return to_route('user.index')->with('success', 'The User Successfully Updated');
            }
        } catch (Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 0,
                    'message' => $e->getMessage()
                ]);
            } else {
                return to_route('user.index')->with('error', $e->getMessage());
            }
        }
    }
    function delete($data)
    {
        try {
            User::findOrFail($data)->delete();
            return to_route('user.index')->with('success', 'The User Successfully deleted');
        } catch (Exception $e) {
            return to_route('user.index')->with('error', $e->getMessage());
        }
    }
}
