@extends('welcome')

@section('auth')
<div class="container">
    <div class="card">
    <div class="card-header">
        Sign in
    </div>
    <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"></p>
        <form action="{{ url('signup') }}" method="post">
            <input type="hidden" value="{{@csrf_token()}}" name="_token" />
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="address1">Address</label>
                <input type="text" class="form-control" id="address1" name="address1" placeholder="1234 Main St">
            </div>
            <div class="form-group">
                <label for="address2">Address 2</label>
                <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" id="city">
                </div>
                <div class="form-group col-md-6">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
    </div>
    </div>
</div>
@endsection