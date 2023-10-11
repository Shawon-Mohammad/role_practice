<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();
        if($request->has('search') ){
            $roles = Role::where('title','like','%'.$request->search)
            // ->orWhere('body','like','%'.$request->search)
            // ->orWhere('Status','like','%'.$request->search)
            ->get();
        }
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $this->authorize('add_role');
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
    function edit($id)
    {
        $this->authorize('edit_role');

        $data['role'] = Role::findOrFail($id);
        $data['permissions'] = Permission::all();
        return view("roles.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);
        try {
            $role = Role::findOrFail($id)->update([
                'title' => $request->title,
                'user_id' => auth()->id()
            ]);
            $role = Role::find($id);
            $role->permissions()->sync($request->permissions);
            if ($request->ajax()) {
                return response()->json([
                    'status' => 1,
                    'message' => 'The role is successfully updated'
                ]);
            } else {
                return to_route('roles.index')->with('success', 'The Role Successfully Updated');
            }
        } catch (Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 0,
                    'message' => $e->getMessage()
                ]);
            } else {
                return to_route('roles.index')->with('error', $e->getMessage());
            }
        }
    }

    function delete($data)
    {
        $this->authorize('delete_role');
        try {
            Role::findOrFail($data)->delete();
            return to_route('roles.index')->with('success', 'The Role Successfully deleted');
        } catch (Exception $e) {
            return to_route('roles.index')->with('error', $e->getMessage());
        }
    }
}
