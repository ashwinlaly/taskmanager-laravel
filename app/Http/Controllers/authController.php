<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\City;
use App\Models\Company;

class authController extends Controller
{

    // View Login page
    public function index()
    {
        // session()->flush();
        return view('auth.login');
    }

    // Login function
    public function login(Request $request)
    {
        $this->validateSigninForm();
        $count = User::where([
                'email' => $request->post('email'),
                'password' =>$request->post('password')
            ])->count();

        if($count == 1){
            session()->put('is_logged_in', true);
        
            $userData = User::where([
                'email' => $request->post('email'),
                'password' =>$request->post('password')
            ])->get()->toArray();
            session()->put('userData', $userData[0]);
                    
            session()->flash('success', 'Login Sucess');
            return redirect('/dashboard');
        } else {
            session()->flash('danger', 'No user found.');
            return redirect('/');
        }
    }

    // show register
    public function create()
    {
        $cities = City::all();
        return view('auth.signup', compact("cities"));
    }

    // Create user
    public function store(Request $request)
    {
        $this->validateSignupForm();
        $user_count = User::where(['email' => $request->post('email')])->count();
        $company_id = Company::select('id')->where('name','like', $request->post('company_name'))->get();
        $company_id = isset($company_id[0]) ? $company_id[0]->id : 1;
        $data = User::insert([
            "name" => $request->post("name"),
            "email" => $request->post("email"),
            "password" => $request->post("password"),
            "address1" => $request->post("address1"),
            "address2" => $request->post("address2"),
            "role_id" => 2,
            "city_id"  => $request->post('city'),
            "company_id" => $company_id,
            "zip" => $request->post("zip"),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        if($data){
            session()->flash('success', 'Account Created sucessfully, please try login');
            return redirect('/');
        } else {
            session()->flash('danger', 'Unable to create account');
            return back()->withInput();
        }
    }

    private function validateSigninForm(){
        return request()->validate([
            "email" => 'required|email|max:100',
            "password" => "required|max:15"
        ]);
    }
    
    private function validateSignupForm(){
        return request()->validate([
            "name" => "required|max:50",
            "email" => 'required|email|unique:users|max:100',
            "password" => "required|max:15",
            "company_name" => "required|max:30",
            "address1" => "required|max:50",
            "address2" => "nullable|max:50",
            "city" => "required|min:1",
            "zip" => "required|max:10"
        ]);
    }

    public function dashboard(){
        return view('home.dashboard');
    }

}
