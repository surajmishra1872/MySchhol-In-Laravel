@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="bg-light">
    <div class="container py-4">
      <div class="row h-100 align-items-center py-2">
        <div class="col-lg-12 text-center">
          <h1 class="display-6">Registration Form</h1>
        </div>
      </div>
   </div>
  </div>

  <div class="form-bg">
    <div class="container">
        <div class="row">
            <center>
            <div class="col-md-offset-3 col-md-6 p-4 ">
                <form class="form-horizontal" id="login_form" action="{{ route('register') }}" method="post">
                  @csrf
                    <span class="heading">Register</span>
                    <div class="form-group">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="email" placeholder="Please enter your name">
                        <i class="fa fa-user"></i>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                     @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Please enter your email">
                        <i class="fa fa-envelope"></i>
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                     @enderror
                    </div>
                    <div class="form-group help">
                        <input type="password" name="password" value="{{old('password')}}" class="form-control" id="password" placeholder="Please enter your password">
                        <i class="fa fa-lock"></i>
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                         @enderror
                    </div>
                    <div class="form-group help">
                        <input type="password" name="password_confirmation" value="{{old('confirm_password')}}" class="form-control" id="password" placeholder="Please enter your confirm password">
                        <i class="fa fa-lock"></i>
                       
                        @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                         @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default ">Register</button>
                    </div>
                </form>
            </div>
  
            @error('failed')
            <strong class="text-danger" style="margin-top:-50px;">{{ $message }}</strong>
            @enderror
        </center>
        </div>
    </div>
  </div>
  
@endsection
