<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class permissionController extends Controller
{
    // show permission page
    // public function index() {}
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
