<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Models\ProjectUser;
use App\Mail\Inviteuser;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_id = session()->get('userData')['id'];
        $company_id = session()->get('userData')['company_id'];
        $users = User::where(['company_id' => $company_id])->where('id', '!=', $admin_id)->get();
        return view('user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::all();
        $projects = Project::where('company_id', session()->get('userData')['company_id'])->get();
        return view('user.create', compact('cities', 'projects', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_id = session()->get('userData')['company_id'];
        $this->validateCreateUserForm();
        $password = "123456";
        $data = User::create([
            "name" => $request->post("name"),
            "email" => $request->post("email"),
            "password" => $password,
            "address1" => $request->post("address1"),
            "address2" => $request->post("address2"),
            "role_id"  => $request->post("role"),
            "city_id"  => $request->post('city'),
            "company_id" => $company_id,
            "zip" => $request->post("zip"),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        if($data->id > 0){
            $mapper = ProjectUser::insert([
                'project_id' => $request->post("project"),
                'user_id' => $data->id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            if($mapper){
                $invite_user = $company_id = session()->get('userData')['name'];
                $data = array(
                    "user" => $request->post("name"),
                    "user_email" => $request->post("email"),
                    "password" => $password,
                    "invite_user" => $invite_user
                );
                Mail::to($request->post("email"))->send(new Inviteuser($data));
                session()->flash('success', 'User Created sucessfully');
                return redirect('/users');
            } else {
                session()->flash('danger', 'Unable to Map user to project');
                return back()->withInput();
            }
        } else {
            session()->flash('danger', 'Unable to create User');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $cities = City::all();
        $projects = Project::all();
        $roles = Role::all();
        return view('user.edit', compact('user', 'cities', 'projects', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->post("name");
        $user->email = $request->post("email");
        $user->address1 = $request->post("address1");
        $user->address2 = $request->post("address2");
        $user->zip = $request->post("zip");
        $user->city = $request->post("city");
        $user->save();
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $data = array("status" => 200);
        return json_encode($data);
    }

    private function validateCreateUserForm(){
        return request()->validate([
            "name" => "required|max:50",
            "email" => 'required|email|unique:users|max:100',
            "address1" => "required|max:50",
            "address2" => "nullable|max:50",
            "city" => "required|min:1",
            "zip" => "required|max:10",
            "project" => "required|min:1"
        ]);
    }

}
