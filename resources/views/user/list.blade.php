@extends('layouts.app')

@section('content')
    <div class="form-inline">
        <h1 class="text-muted display-6">
            Users Listing
        </h1>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">City</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($users))
                @foreach($users as $key => $user) 
                    <tr>
                        <th scope="row"> {{ $key+1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->city->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('users.edit',[$user->id])}}">Edit</a>
                            <button class="btn btn-danger delete-from-list" data-id="{{$user->id}}" data-type="user">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr colspan="4">
                    No users found
                </tr>
            @endif
        </tbody>
    </table>
    <input type="hidden" value="{{@csrf_token()}}" name="_token" id="token"/>
    <input type="hidden" value="{{url('users')}}" name="url" id="url"/>

@endsection