<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CreatedAccount;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\City;
use App\Models\Company;
use App\Models\Project;
use App\Models\Task;

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

    public function forgotpasswordget()
    {
        return view('auth.forgotpassword');
    }

    public function forgotpasswordpost(Request $request)
    {
        // $this->validateForgotPasswordForm();
        $user = User::where([
            'email' => $request->post('email')
        ])->get();

        if($user->count() == 1){
            Mail::to($request->post("email"))->send(new ForgotPassword($user));
            session()->flash('success', 'Reset password sent to Email');
            return redirect('/');
        } else {
            session()->flash('danger', 'No user found.');
            return redirect('/');
        }
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
            Mail::to($request->post("email"))->send(new CreatedAccount());
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

    private function validateForgotPasswordForm(){
        return request()->validate([
            "email" => 'required|email|max:100'
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

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function dashboard(){
        $company_id = session()->get('userData')['company_id'];
        $user_id = session()->get('userData')['id']; 
        $project_count = Project::where(['company_id' => $company_id])->count();
        $user_count = User::where(['company_id' => $company_id])->count();
        $pending_task_count = Task::where(['user_id' => $user_id, 'status' => 1])->count();
        $completed_task_count = Task::where(['user_id' => $user_id, 'status' => 2])->count();
        return view('home.dashboard', [
                "project_count" => $project_count,
                "user_count" => $user_count,
                "completed_task_count" => $completed_task_count,
                "pending_task_count"  => $pending_task_count
            ]);
    }

}
