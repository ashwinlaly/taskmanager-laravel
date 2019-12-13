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
                <th scope="col">Assigned to</th>
                <th scope="col">DeadLine</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($tasks))
                @foreach($tasks as $key => $task) 
                    <tr>
                        <th scope="row"> {{ $key+1 }}</th>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->user->name }}</td>
                        <td>{{ date('Y-m-d', strtotime($task->deadline)) }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('tasks.edit',[$task->id])}}">Edit</a>
                            <button class="btn btn-danger delete-from-list" data-id="{{$task->id}}" data-type="task">Delete</button>
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
    <input type="hidden" value="{{url('tasks')}}" name="url" id="url"/>

@endsection