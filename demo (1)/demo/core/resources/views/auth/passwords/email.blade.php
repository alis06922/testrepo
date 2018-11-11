@extends('layouts.app')

@section('content')
<!-- Bootstrap core CSS-->
 <!-- Latest Bootstrap min CSS -->
 <link rel="stylesheet" href="assets/frontlending/bootstrap/css/bootstrap.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="{{asset('assets/frontlending/css/authstyle.css')}}">
  <style>
  input[type=email]{
     border: 1px solid #ced4da;
   } 
    input[type=email]:focus{
     border: 1px solid #ced4da;
   }    
  </style>
<section class="contact-section contact-bg h-100" id="contact" style="background-image: url({{asset('assets/images/logo/bc.jpg')}});" >
<div class="lr_wrap">
          <div class="card-body">
          	<div class="lr_icon text-center">
          	<img src="{{asset('assets/frontlending/images/logo8.png') }}" alt="logo"/>
            </div>	
            <h6 class="my-4 text-center text-uppercase">Reset Password</h6>
            <p class="small text-center">Enter your email address and we will send you instructions on how to reset your password.</p>
            <form method="POST" action="{{ route('forgot.pass') }}">
            {{ csrf_field() }}
              <div class="form-group">
              <input id="email" type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              </div>
              <button type="submit" class="btn btn-default btn-block" value="Send Reset Link">Send Reset Link</button>
            </form>
            <div class="text-center mt-3">
              <a class="d-block small" href="{{route('login')}}"><i class="icon-arrow-left-circle icons"></i> Back To Login</a>
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