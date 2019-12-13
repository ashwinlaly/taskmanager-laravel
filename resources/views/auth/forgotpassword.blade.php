@extends('welcome')

@section('auth')
<div class="container">
   <div class="card">
      <div class="card-header">
         Forgot Password
      </div>
      <div class="card-body">
         <h5 class="card-title"></h5>
         <p class="card-text"></p>
         <form method="post" action="{{ url('forgotpassword') }}">
            <input type="hidden" value="{{@csrf_token()}}" name="_token" />

            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" aria-describedby="emailHelp" placeholder="Enter email">
               @if($errors->has('email'))
                  <small  class="form-text text-muted error">{{ $errors->first('email') }}</small>
               @endif
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>
   @include('layouts.alert')
</div>
@endsection