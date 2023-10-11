<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::all();
        if($request->has('search') ){
            $permissions = Permission::where('id','like','%'.$request->search)
            ->orWhere('title','like','%'.$request->search)
            // ->orWhere('Status','like','%'.$request->search)
            ->get();
        }
        return view('permissions.index', compact('permissions'));
    }
    public function create()
    {
        $this->authorize('delete_permission');
        return view('permissions.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        try {
            $permission = Permission::create([
                'title' => $request->title
            ]);
            return to_route('permissions.index')->with('success', 'The Permission Successfully Created');
        } catch (Exception $e) {
            return to_route('permissions.index')->with('error', $e->getMessage());
        }
    }
    function edit($data)
    {
        $this->authorize('delete_permission');

        $permission = Permission::findOrFail($data);
        return view("permissions.edit", compact('permission'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);
        try {
            $Permission = Permission::findOrFail($id)->update([
                'title' => $request->title,
                'user_id' => auth()->id()
            ]);
            if ($request->ajax()) {
                return response()->json([
                    'status' => 1,
                    'message' => 'The permission is successfully updated'
                ]);
            } else {
                return to_route('permissions.index')->with('success', 'The Permission Successfully Updated');
            }
        } catch (Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 0,
                    'message' => $e->getMessage()
                ]);
            } else {
                return to_route('permissions.index')->with('error', $e->getMessage());
            }
        }
    }

    function delete($data)
    {
        $this->authorize('delete_permission');
        try {
            Permission::findOrFail($data)->delete();
            return to_route('permissions.index')->with('success', 'The Permission Successfully deleted');
        } catch (Exception $e) {
            return to_route('permissions.index')->with('error', $e->getMessage());
        }
    }
}
