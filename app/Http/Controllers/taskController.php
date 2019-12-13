<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'ASC')->paginate(5);
        return view('task.list', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_id = session()->get('userData')['company_id'];
        $projects = Project::where(['company_id' => $company_id])->get();
        $users = User::where(['company_id' => $company_id])->get();
        return view('task.create', [
            "projects" => $projects,
            "users" => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateTaskCreate();
        $data = Task::create([
            "project_id" => $request->post("project"),
            "user_id" => $request->post("user"),
            "name" => $request->post("name"),
            "description" => $request->post("description"),
            "deadline" => $request->post("deadline"),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        if($data){
            session()->flash('success', 'Task Created Sucessfully');
            return redirect('tasks');
        } else {
            session()->flash('danger', 'Unable to create Task');
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
        $task = Task::find($id);
        $projects = Project::all();
        $users = User::all();
        return view('task.edit', compact('task', 'projects', 'users'));
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
        $this->validateTaskCreate();
        $task = Task::find($id);
        $task->project_id = $request->post("project");
        $task->user_id = $request->post("user");
        $task->name = $request->post("name");
        $task->description = $request->post("description");
        $task->deadline = $request->post("deadline");
        $task->updated_at = date('Y-m-d H:i:s');
        $task->save();
        session()->flash('success', 'Task Updated Sucessfully');
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Task::find($id);
        $role->delete();
        $data = array("status" => 200);
        return json_encode($data);
    }

    public function getSubUserTasks()
    {
        $user_id = session()->get('userData')['id'];
        $company_id = session()->get('userData')['company_id'];
        $tasks = Task::where(['user_id' => $user_id])->paginate(5);
        $users = User::where('id', '!=', $user_id)
                     ->where(['company_id' => $company_id])
                     ->orderBy('created_at', 'ASC')
                     ->get();
        return view('task.mytask', compact('tasks', 'users'));
    }

    public function getTaskAssignedto(Request $request){
        $task_id = $request->post("task_id");
        $status = $request->post("status");
        $assignto = $request->post("assignto");

        $task = Task::find($task_id);
        $task->status = $status;
        $task->user_id = $assignto;
        $task->save();

        $data = array("status" => 200);
        return json_encode($data);
    }

    private function validateTaskCreate(){
        return request()->validate([
            "name" => "required|max:50",
            "project" => "required|max:15",
            "deadline" => "required|date",
            "user" => "required|max:30",
            "description" => "required|max:50"
        ]);
    }
}
