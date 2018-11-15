@extends('layouts.app')

@section('content')
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"+vsHr1WyR620WR", domain:"zircash.io",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://certify-js.alexametrics.com/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://certify.alexametrics.com/atrk.gif?account=+vsHr1WyR620WR" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->  
<!-- Bootstrap core CSS-->
 <!-- Latest Bootstrap min CSS -->
 <link rel="stylesheet" href="assets/frontlending/bootstrap/css/bootstrap.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="{{asset('assets/frontlending/css/authstyle.css')}}">
  <style>
  .navbar-area .logo {
    margin-top:0px !important
  }
  .navbar-area{
  background-color:#193d85 !important;
  }
  .lr_wrap{
      transform: translateY(-11%) !important;
      position:relative !important;
      max-width: 500px !important;
      background-color: #fff !important;
	border-radius: 5px !important;
	border-top: 3px solid #ff67cb !important;
	left: 0 !important;
	margin: 0 auto !important;
	right: 0 !important;
	top: 50% !important;
  }
  input[type=text]{
     border: 1px solid #ced4da;
   }
   input[type=email] {
       border: 1px solid #ced4da;
   }
    input[type=email]:focus {
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
            <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            @if(isset($reference))
                        <input type="hidden" name="refer" value="{{$reference}}">
                    @endif
              <div class="form-group">
                <label for="name">Your Name</label>
                <input id="name" class="form-control" type="text" placeholder="Your Name" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                             @endif
              </div>
              <div class="form-group">
                <label for="username">UserName</label>
                <input id="username" class="form-control" type="text" placeholder="Username" name="username" value="{{ old('username') }}" required>
              @if ($errors->has('username'))
                  <span class="help-block">
                     <strong>{{ $errors->first('username') }}</strong>
                 </span>
              @endif
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input id="email" class="form-control" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
                   <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="mobile">Mobile</label>
                <input id="mobile" class="form-control" type="text" placeholder="Mobile Number" name="mobile" value="{{ old('mobile') }}" required>

                @if($errors->has('mobile'))
                 <span class="help-block">
                    <strong>{{ $errors->first('mobile') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" placeholder="Password" name="password" required>
              @if ($errors->has('password'))
                  <span class="help-block">
                   <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
              </div>
              <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
              <input id="password-confirm" class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation" required>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" required> I agree to Terms & Pollicy.</label>
                </div>
              </div>
              <button type="submit" value="Sign Up" class="btn btn-default btn-block" >Sign Up</button>
            </form>
            <div class="text-center mt-3">
              <span class="small">Already have an account? <a href="{{route('login')}}">Login</a></span>
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