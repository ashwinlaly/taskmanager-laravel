<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class roleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(5);
        return view('role.list', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $this->validateCreateRole();
        $role_count = Role::where('name','like', $request->post('name'))->count();
        if($role_count == 0){
            $data = Role::insert([
                "name" => $request->post("name"),
                "description" => $request->post("description"),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            if($data){
                session()->flash('success', 'Created new Role');
                return redirect('roles');
            } else {
                session()->flash('danger', 'Unable to create Role');
                return back()->withInput();
            }
        } else {
            session()->flash('danger', 'Role already exists');
            return back()->withInput();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $this->validateCreateRole();
        $role = Role::find($id);
        $role->name = $request->post("name");
        $role->description = $request->post("description");
        $role->save();
        return redirect('roles');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        $data = array("status" => 200);
        return json_encode($data);
    }

    private function validateCreateRole(){
        return request()->validate([
            "name" => "required|max:50",
            "description" => "required|max:50",
        ]);
    }
}
