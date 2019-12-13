@extends('layouts.app')

@section('content')

<div class="container">
        <div class="card">
            <div class="card-header">
                Update User
            </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <form action="{{ route('users.update',[$user->id]) }}" method="post">
                <input type="hidden" value="{{@csrf_token()}}" name="_token" />
                <input type="hidden" value="patch" name="_method" />
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ ($user->name) ? $user->name : old('name') }}" id="name" name="name" placeholder="Name">
                            @if($errors->has('name'))
                                <small  class="form-text text-muted error">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ ($user->email) ? $user->email : old('email') }}"/>
                            @if($errors->has('email'))
                                <small  class="form-text text-muted error">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address1">Address</label>
                        <input type="text" class="form-control" id="address1" name="address1" placeholder="1234 Main St" value="{{ ($user->address1) ? $user->address1 : old('address1') }}"/>
                        @if($errors->has('address1'))
                            <small  class="form-text text-muted error">{{ $errors->first('address1') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address2">Address 2</label>
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment, studio, or floor" value="{{ ($user->address2) ? $user->address2 : old('address2') }}"/>
                        @if($errors->has('address2'))
                            <small  class="form-text text-muted error">{{ $errors->first('address2') }}</small>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <select  name="city" class="form-control" id="city">
                                <option value="0">Please select an Option</option>
                                @foreach($cities as $city)
                                    <option value={{ $city->id }} {{ ($user->city_id == $city->id) ? 'selected' : '' }}  >{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('city'))
                                <small  class="form-text text-muted error">{{ $errors->first('city') }}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" value="{{ ($user->zip) ? $user->zip : old('zip') }}">
                            @if($errors->has('zip'))
                                <small  class="form-text text-muted error">{{ $errors->first('zip') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="project">Project</label>
                            <select  name="project" class="form-control" id="project">
                                <option value="0">Please select an Option</option>
                                @foreach($projects as $project)
                                    <option value={{ $project->id }} {{ ($user->project_id == $project->id) ? 'selected' : '' }}  >{{ $project->name }}</option>    
                                @endforeach
                            </select>
                            @if($errors->has('project'))
                                <small  class="form-text text-muted error">{{ $errors->first('project') }}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="role">Role</label>
                            <select  name="role" class="form-control" id="role">
                                <option value="0">Please select an Option</option>
                                @foreach($roles as $role)
                                    <option value={{ $role->id }} {{ ($user->role_id == $role->id) ? 'selected' : '' }}  >{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('role'))
                                <small  class="form-text text-muted error">{{ $errors->first('role') }}</small>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
        </div>
    </div>

@endsection