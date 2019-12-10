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
                            <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="Name">
                            @if($errors->has('name'))
                                <small  class="form-text text-muted error">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="{{old('company_name')}}">
                            @if($errors->has('company_name'))
                                <small  class="form-text text-muted error">{{ $errors->first('company_name') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}"/>
                            @if($errors->has('email'))
                                <small  class="form-text text-muted error">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                            @if($errors->has('password'))
                                <small  class="form-text text-muted error">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address1">Address</label>
                        <input type="text" class="form-control" id="address1" name="address1" placeholder="1234 Main St" value="{{old('address1')}}"/>
                        @if($errors->has('address1'))
                            <small  class="form-text text-muted error">{{ $errors->first('address1') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address2">Address 2</label>
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment, studio, or floor" value="{{old('address2')}}"/>
                        @if($errors->has('address2'))
                            <small  class="form-text text-muted error">{{ $errors->first('address2') }}</small>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <!-- <input type="text" name="city" class="form-control" id="city"> -->
                            <select  name="city" class="form-control" id="city">
                                <option value="0">Please select an Option</option>
                                @foreach($cities as $city)
                                    <option value={{ $city->id }} {{ (old('city') == $city->id) ? 'selected' : '' }}  >{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('city'))
                                <small  class="form-text text-muted error">{{ $errors->first('city') }}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip">
                            @if($errors->has('zip'))
                                <small  class="form-text text-muted error">{{ $errors->first('zip') }}</small>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
            @include('layouts.alert')
        </div>
    </div>
@endsection