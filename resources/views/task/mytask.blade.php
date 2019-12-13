@extends('layouts.app')

@section('content')
    <div class="form-inline">
        <h1 class="text-muted display-6">
            Task Listing
        </h1>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">DeadLine</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Transfer To</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($tasks))
                @foreach($tasks as $key => $task) 
                    <tr>
                        <th scope="row"> {{ $key+1 }}</th>
                        <td>{{ $task->name }}</td>
                        <td>{{ date('Y-m-d', strtotime($task->deadline)) }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            <select class="form-control" id="status_{{$task->id}}">
                                <option value="1" {{($task->status == 'Pending') ? 'selected' : ''}}>Pending</option>
                                <option value="2" {{($task->status == 'Completed') ? 'selected' : ''}}>Completed </option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" id="assign_{{$task->id}}">
                                <option value="0">Select an Assigne</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ ($task->user_id == $user->id) ? 'selected' : '' }}>{{ $user->name }} - {{ $user->role->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-info taskassign" data-id={{$task->id}} >Assgin</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr colspan="4">
                    No tasks found
                </tr>
            @endif
        </tbody>
    </table>
    <input type="hidden" value="{{@csrf_token()}}" name="_token" id="token"/>
    <input type="hidden" value="{{url('assigntask')}}" name="url" id="url"/>

@endsection