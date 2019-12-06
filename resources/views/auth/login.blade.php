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
            <div class="form-group">
               <label for="exampleInputEmail1">Email</label>
               <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
               <small id="emailHelp" class="form-text text-muted">Error</small>
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" class="form-control" id="password" name="password" placeholder="Password">
               <small id="emailHelp" class="form-text text-muted">Error</small>
            </div>
            <div class="form-group form-check">
               <input type="checkbox" class="form-check-input" id="exampleCheck1">
               <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>
</div>
@endsection