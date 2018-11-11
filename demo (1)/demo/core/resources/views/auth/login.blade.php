@extends('layouts.app')

@section('content')

  <!-- Bootstrap core CSS-->
 <!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="assets/frontlending/bootstrap/css/bootstrap.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="assets/frontlending/css/authstyle.css">
  <style>
  input[type=text]{
     border: 1px solid #ced4da;
   }
input[type=password]{
     border: 1px solid #ced4da;
   }      
    input[type=text]:focus{
     border: 1px solid #ced4da;
   }
input[type=password]:focus{
     border: 1px solid #ced4da;
   }      
   
      
  </style>

    <section class="h-100 contact-section contact-bg" id="contact" style="background-image: url({{asset('assets/images/logo/bc.jpg')}});">
      <div class="lr_wrap">
          <div class="card-body">
          	<div class="lr_icon text-center">
          	<img src="{{asset('assets/frontlending/images/logo8.png') }}" alt="logo"/>
            </div>	
            <h6 class="my-4 text-center text-uppercase">Welcome to ZIRCASH</h6>
            <form  method="POST" action="{{ route('login') }}">
               {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleInputEmail1">UserName</label>
                <input id="username" class="form-control" type="text" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="password" type="password" placeholder="Password" name="password" required>
                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
             <!-- <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Remember Password</label>
                </div>
              </div> -->
              <button type="submit" class="btn btn-default btn-block" value="Log In">Login</button>
            </form>
            <div class="text-center mt-3 justify-content-between d-md-flex">
              <a class="d-block small" href="{{route('register')}}">Register an Account</a>
              <a class="d-block small" href="{{route('password.request')}}">Forgot Password?</a>
            </div>
          </div>
        </div>
    </section>
    <!-- Latest jQuery --> 
<script src="assets/frontlending/js/jquery-1.12.4.min.js"></script> 
<!-- Latest compiled and minified Bootstrap --> 
<script src="assets/frontlending/js/popper.min.js"></script>
<script src="assets/frontlending/bootstrap/js/bootstrap.min.js"></script> 
@endsection