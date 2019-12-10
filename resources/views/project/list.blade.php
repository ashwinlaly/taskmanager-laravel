@extends('layouts.app')

@section('content')

    <div class="form-inline">
        <h1 class="text-muted display-6">
            Projects Listing
        </h1>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($projects))
                @foreach($projects as $key => $project) 
                    <tr>
                        <th scope="row"> {{ $key+1 }}</th>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('projects.edit',[$project->id])}}">Edit</a>
                            <button class="btn btn-danger delete-from-list" data-id="{{$project->id}}" data-type="project">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr colspan="4">
                    No projects found
                </tr>
            @endif
        </tbody>
    </table>
    <input type="hidden" value="{{@csrf_token()}}" name="_token" id="token"/>
    <input type="hidden" value="{{url('projects')}}" name="url" id="url"/>
@endsection