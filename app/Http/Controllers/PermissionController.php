<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //this method will show permission pagee
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'desc')->paginate();
        return view('permissions.list',[
            'permissions' => $permissions
        ]);
    }

    //this method will show create permission page
    public function create()
    {
        return view(view: 'permissions.create');

    }

    //this method will store permission
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions|min:3'
        ]);
        if($validator->passes()) {
              Permission::create(['name' => $request->name]);
              return redirect()->route('permissions.index')->with('success','Permission created Successfully');
        } else {
            return redirect()->route('permissions.create')
            ->withInput()->withErrors($validator);
        }
    }

    //this method will edit a permission
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit',[
            'permission' => $permission
        ]);
    }

    //this method will update a permission
    public function update($id, Request $request)
    {
        $permission = Permission::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions,name, '.$id.',id|min:3'
        ]);

        if($validator->passes()) {
              $permission->name = $request->name;
              $permission->save();
              return redirect()->route('permissions.index')->with('success','Permission Updated Successfully');
        } else {
            return redirect()->route('permissions.edit', $id)
            ->withInput()->withErrors($validator);
        }
    }

    //this method will destroy a permission
    public function delete()
    {

    }
}