<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // $this->validateProfileUpdate();
        $id = session()->get('userData')['id'];
        $profile = User::find($id);
        $cities = City::all();
        return view('profile.edit', compact('profile', 'cities'));
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
        $user->city_id  = $request->post('city');
        $user->zip = $request->post("zip");
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateProfileUpdate(){
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

}
