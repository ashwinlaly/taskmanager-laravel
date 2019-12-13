@extends('layouts.app')

@section('content')
    <div class="form-inline">
        <h1 class="text-muted display-6">
            Roles Listing
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
            @if(isset($roles))
                @foreach($roles as $key => $role) 
                    <tr>
                        <th scope="row"> {{ $key+1 }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('roles.edit',[$role->id])}}">Edit</a>
                            <button class="btn btn-danger delete-from-list" data-id="{{$role->id}}" data-type="role">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr colspan="4">
                    No roles found
                </tr>
            @endif
        </tbody>
    </table>
    <input type="hidden" value="{{@csrf_token()}}" name="_token" id="token"/>
    <input type="hidden" value="{{url('roles')}}" name="url" id="url"/>

    <center>
        <nav class="navigation">
            {{ $roles->links() }}
        </nav>
    </center>

@endsection