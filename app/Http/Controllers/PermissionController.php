<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class permissionController extends Controller
{
    // show permission page
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'ASC')->paginate(10);
        return view('permissions.list', ['permissions' => $permissions]);
    }
    // show permission create page
    public function create()
    {
        return view('permissions.create');
    }
    // insert permission in db
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3'
        ]);
        if ($validator->passes()) {
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission added successfully');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }

    // show permission edit page

    // public function edit() {}
    // show update permission page
    // public function update() {}
    // show delete permission

    // public function destroy() {}
}
