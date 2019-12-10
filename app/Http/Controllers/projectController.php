<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.list', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateCreateProject();
        $company_id = session()->get('userData')['company_id'];
        $project_count = Project::where('name','like', $request->post('name'))
                                ->where('company_id', $company_id)->count();
        if($project_count == 0){
            $data = Project::insert([
                "name" => $request->post("name"),
                "description" => $request->post("description"),
                "company_id" => $company_id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            if($data){
                session()->flash('success', 'Created new project');
                return redirect('projects');
            } else {
                session()->flash('danger', 'Unable to create project');
                return back()->withInput();
            }
        } else {
            session()->flash('danger', 'Project already exists');
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
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('project.edit', compact('project'));
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
        $this->validateCreateProject();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        $data = array("status" => 200);
        return json_encode($data);
    }

    private function validateCreateProject(){
        return request()->validate([
            "name" => "required|max:50",
            "description" => "required|max:50",
        ]);
    }
}
