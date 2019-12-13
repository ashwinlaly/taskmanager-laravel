@extends('layouts.app')

@section('content')

<div class="container">
   <div class="card">
      <div class="card-header">
         Create Task
      </div>
      <div class="card-body">
         <h5 class="card-title"></h5>
         <p class="card-text"></p>
         <form method="post" action="{{ route('tasks.store') }}">
            <input type="hidden" value="{{@csrf_token()}}" name="_token" />
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="project">Project</label>
                    <select  name="project" class="form-control" id="project">
                        <option value="0">Please select an Option</option>
                        @foreach($projects as $project)
                            <option value={{ $project->id }} {{ (old('project') == $project->id) ? 'selected' : '' }}  >{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project'))
                        <small  class="form-text text-muted error">{{ $errors->first('project') }}</small>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="user">User</label>
                    <select  name="user" class="form-control" id="user">
                        <option value="0">Please select an Option</option>
                        @foreach($users as $user)
                            <option value={{ $user->id }} {{ (old('user') == $user->id) ? 'selected' : '' }}  >{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('user'))
                        <small  class="form-text text-muted error">{{ $errors->first('user') }}</small>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="name" class="form-control" id="name" value="{{old('name')}}" name="name" aria-describedby="name" placeholder="Enter Task Name">
                    @if($errors->has('name'))
                        <small  class="form-text text-muted error">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="deadline">DeadLine</label>
                    <input type="date" class="form-control" id="deadline" value="{{old('deadline')}}" name="deadline" aria-describedby="deadline" placeholder="Enter Deadline">
                    @if($errors->has('deadline'))
                        <small  class="form-text text-muted error">{{ $errors->first('deadline') }}</small>
                    @endif
                </div>
            </div>
            <div class="form-group">
               <label for="description">Description</label>
               <input type="description" class="form-control" id="password" name="description" placeholder="Description">
               @if($errors->has('description'))
                  <small  class="form-text text-muted error">{{ $errors->first('description') }}</small>
               @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>
</div>

@endsection