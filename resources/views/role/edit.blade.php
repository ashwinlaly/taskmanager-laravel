@extends('layouts.app')

@section('content')

<div class="container">
   <div class="card">
      <div class="card-header">
         Update Role
      </div>
      <div class="card-body">
         <h5 class="card-title"></h5>
         <p class="card-text"></p>
         <form method="post" action="{{ route('roles.update',[$role->id]) }}">
            <input type="hidden" value="{{@csrf_token()}}" name="_token" />
            <input type="hidden" value="patch" name="_method" />
            <div class="form-group">
               <label for="name">Name</label>
               <input type="name" class="form-control" id="name" value="{{ (old('name'))? old('name') : $role->name}}" name="name" aria-describedby="name" placeholder="Enter Role Name">
               @if($errors->has('name'))
                  <small  class="form-text text-muted error">{{ $errors->first('name') }}</small>
               @endif
            </div>
            <div class="form-group">
               <label for="description">Description</label>
               <input type="description" class="form-control" id="description" name="description" placeholder="Description" value="{{ (old('description'))? old('description') : $role->description}}">
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