<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
    public function create()
    {
        return view('roles.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        try {
            $role = Role::create([
                'title' => $request->title
            ]);
            return to_route('roles.index')->with('success', 'The Role Successfully Created');
        } catch (Exception $e) {
            return to_route('roles.index')->with('error', $e->getMessage());
        }
    }
    function edit($data)
    {
        $role = Role::findOrFail($data);
        return view("roles.edit", compact('role'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);
        try {
            Role::findOrFail($id)->update([
                'title' => $request->title
            ]);
            return to_route('roles.index')->with('success', 'The Role Successfully Created');
        } catch (Exception $e) {
            return to_route('roles.index')->with('error', $e->getMessage());
        }
    }

    function delete($data)
    {
        try {
            Role::findOrFail($data)->delete();
            return to_route('roles.index')->with('success', 'The Role Successfully deleted');
        } catch (Exception $e) {
            return to_route('roles.index')->with('error', $e->getMessage());
        }
    }
}
