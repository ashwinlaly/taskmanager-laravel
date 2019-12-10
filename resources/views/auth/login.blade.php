@extends('welcome')

@section('auth')
<div class="container">
   <div class="card">
      <div class="card-header">
         Login 
      </div>
      <div class="card-body">
         <h5 class="card-title"></h5>
         <p class="card-text"></p>
         <form method="post" action="{{ url('login') }}">
            <input type="hidden" value="{{@csrf_token()}}" name="_token" />
            <div class="form-group">
               <label for="exampleInputEmail1">Email</label>
               <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" aria-describedby="emailHelp" placeholder="Enter email">
               @if($errors->has('email'))
                  <small  class="form-text text-muted error">{{ $errors->first('email') }}</small>
               @endif
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" class="form-control" id="password" name="password" placeholder="Password">
               @if($errors->has('password'))
                  <small  class="form-text text-muted error">{{ $errors->first('password') }}</small>
               @endif
            </div>
            <div class="form-group form-check">
               <input type="checkbox" class="form-check-input" id="exampleCheck1">
               <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>
   @include('layouts.alert')
</div>
@endsection