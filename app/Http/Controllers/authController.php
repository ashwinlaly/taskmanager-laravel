<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{

    // View Login page
    public function index()
    {
        return view('auth.login');
    }

    // Login function
    public function login()
    {
        
    }

    // show register
    public function create()
    {
        return view('auth.signup');
    }

    // Create user
    public function store(Request $request)
    {
        dd($request->all());
    }
    
}
