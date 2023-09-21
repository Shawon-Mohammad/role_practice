<?php

namespace App\Http\Controllers;

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
    function edit($data)
    {
        $user = User::findOrFail($data);
        return view("user.edit", compact('user'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        try {
            $user = User::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return to_route('user.index')->with('success', 'The User Successfully Created');
        } catch (Exception $e) {
            return to_route('user.index')->with('error', $e->getMessage());
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
