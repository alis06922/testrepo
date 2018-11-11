<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="this is a demo meta description">
	<meta name="keywords" content="this is a demo meta keywords">
	<link rel="shortcut icon" href="{{asset('assets/images/logo/icon.png') }}" type="image/x-icon">
	<title>{{$gnl->title}} | {{$gnl->subtitle}} </title>
  <!-- Animation CSS -->
<link rel="stylesheet" href="assets/frontlending/css/animate.css">
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="assets/frontlending/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="assets/frontlending/css/font-awesome.min.css" >
<!-- ionicons CSS -->
<link rel="stylesheet" href="assets/frontlending/css/ionicons.min.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="assets/frontlending/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/frontlending/owlcarousel/css/owl.theme.default.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="assets/frontlending/css/magnific-popup.css">
<link rel="stylesheet" href="assets/frontlending/css/spop.min.css">
<!-- Style CSS -->
<link rel="stylesheet" href="assets/frontlending/css/style.css">
<link rel="stylesheet" href="assets/frontlending/css/responsive.css">
<!-- Color CSS -->
<link id="layoutstyle" rel="stylesheet" href="assets/frontlending/color/theme.css">

	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script src="{{asset('assets/front/js/jquery-2.2.4.min.js') }}"></script>
<style type="text/css">

input 
{
	outline: none;
}
input[type=search] 
{
	-webkit-appearance: textfield;
	-webkit-box-sizing: content-box;
	font-family: inherit;
	font-size: 100%;
}
input::-webkit-search-decoration,
input::-webkit-search-cancel-button 
{
	display: none; 
}


input[type=search] {
	background: #ededed url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
	border: solid 1px #ccc;
	padding: 9px 10px 9px 32px;
	width: 0px;
	
	-webkit-border-radius: 10em;
	-moz-border-radius: 10em;
	border-radius: 10em;
	
	-webkit-transition: all .5s;
	-moz-transition: all .5s;
	transition: all .5s;
}
input[type=search]:focus {
	width: 230px;
	background-color: #fff;
	border-color: #{{$gnl->color}};
	
	-webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
	-moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
	box-shadow: 0 0 5px rgba(109,207,246,.5);
}

input:-moz-placeholder {
	color: #999;
}
input::-webkit-input-placeholder {
	color: #999;
}
 </style>
</head>
<body class="v_cyan_blue" data-spy="scroll" data-offset="110">
	
<!-- START LOADER -->
<div id="loader-wrapper">
    <div id="loading-center-absolute">
        <div class="object" id="object_four"></div>
        <div class="object" id="object_three"></div>
        <div class="object" id="object_two"></div>
        <div class="object" id="object_one"></div>
    </div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<!-- END LOADER --> 

<!-- START HEADER -->
<header class="header_wrap fixed-top">
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg"> 
			<a class="navbar-brand page-scroll animation" href="{{url('/')}}" data-animation="fadeInDown" data-animation-delay="1s"> 
            	<img class="logo_light" src="{{asset('assets/frontlending/images/logo8.png') }}" alt="logo" /> 
            </a>
            <button class="navbar-toggler animation" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-animation="fadeInDown" data-animation-delay="1.1s"> 
                <span class="ion-android-menu"></span> 
            </button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="animation" data-animation="fadeInDown" data-animation-delay="1.2s"><a class="nav-link page-scroll nav_item" href="{{url('/')}}">Home</a></li>
                    <li class="animation" data-animation="fadeInDown" data-animation-delay="1.2s"><a class="nav-link page-scroll nav_item" href="#about">About</a></li>
                    <li class="animation" data-animation="fadeInDown" data-animation-delay="1.3s"><a class="nav-link page-scroll nav_item" href="#why">Why</a></li>
                    <li class="animation" data-animation="fadeInDown" data-animation-delay="1.4s"><a class="nav-link page-scroll nav_item" href="#token">Token</a></li>
                    <li class="animation" data-animation="fadeInDown" data-animation-delay="1.5s"><a class="nav-link page-scroll nav_item" href="#roadmap">Road Map</a></li>
                    <li class="animation" data-animation="fadeInDown" data-animation-delay="1.6s"><a class="nav-link page-scroll nav_item" href="#team">Team</a></li>
                    <li class="animation" data-animation="fadeInDown" data-animation-delay="1.7s"><a class="nav-link page-scroll nav_item" href="#faq">FAQ</a></li>
                    <li class="animation" data-animation="fadeInDown" data-animation-delay="1.8s"><a class="nav-link page-scroll nav_item" href="#contact">Contact</a></li>
                    <li class="animation" data-animation="fadeInDown" data-animation-delay="1.9s"><a class="nav-link nav_icon nav_item" title="Join Us on Telegram" href="#"><i class="fa fa-send"></i></a></li>
                 </ul>
                <ul class="navbar-nav nav_btn align-items-center">
                @auth
                        <li><a href="{{route('home')}}">{{Auth::user()->name}}</a></li>
                         <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span>SIGN OUT</span>
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                          </form>
                        </li>
                        @else
                        <li class="animation" data-animation="fadeInDown" data-animation-delay="2.1s"><a class="btn btn-white btn-radius nav_item" href="{{route('login')}}">Login</a></li>
                    <li class="animation" data-animation="fadeInDown" data-animation-delay="2.2s"><a class="nav-link nav_item" href="{{route('register')}}">Sign Up</a></li>
                        @endauth
                  
                </ul>
			</div>
		</nav>
	</div>
</header>
<!-- END HEADER --> 

<!-- START SECTION BANNER -->
<section id="home_section" class="section_banner section_gradiant3">
    <div id="banner_bg_effect" class="banner_effect"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-sm-12 order-lg-first">
                <div class="banner_text_s2">
                    <h1 class="animation text-white" data-animation="fadeInUp" data-animation-delay="1.1s"><strong>Zircash</strong> is an avant-garde <strong>cryptocurrency</strong> and a modern form of  <strong>asset.</strong></h1>
                    <p class="animation text-white" data-animation="fadeInUp" data-animation-delay="1.3s">The contract will immediately be started on the smart contracts and will be self executed after 30 days of initiation. </p>
                    <div class="btn_group animation" data-animation="fadeInUp" data-animation-delay="1.4s"> 
                        <a href="#whitepaper" class="btn btn-default btn-radius page-scroll"><i class="fa fa-file-word-o"></i>Whitepaper</a> 
                        <a href="{{route('register')}}" class="btn btn-border-white btn-radius">Sign Up To Join <i class="ion-ios-arrow-thin-right"></i></a> 
                    </div>
                    <div class="vertical_social">
    	<ul class="list_none d-flex d-lg-block">
        	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
            <li><a href="#"><i class="fa fa-github"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-medium"></i></a></li>
            <li><a href="#"><i class="fa fa-bitcoin"></i></a></li>
        </ul>
    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-8 offset-md-2 col-sm-12 order-first">
                <div class="banner_inner res_md_mb_50 res_xs_mb_30">
                    <div class="tk_countdown v_royal_blue  v_royal_blue banner_inner   text-center animation" data-animation="fadeIn" data-animation-delay="1.1s">
                        <div class="banner_text tk_counter_inner">
                            <div class="tk_countdown_time p-0 transparent_bg box_shadow_none animation" data-animation="fadeInUp" data-animation-delay="1.2s" data-time="2018/10/03 00:00:00"></div>
                            <div class="progress animation" data-animation="fadeInUp" data-animation-delay="1.3s">
                            <div class="progress-bar progress-bar-striped gradient" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%"> 20% </div>
                                <span class="progress_label bg-white" style="left: 20%"> <strong> 600000 ZIR </strong></span>
                                <span class="progress_label bg-white" style="left: 100%"> <strong> 3M Token </strong></span>
                                <span class="progress_min_val">Sale Raised</span>
                                <span class="progress_max_val">Total Supply</span>
                            </div>
                        	<a href="{{route('register')}}" class="btn btn-default btn-radius animation" data-animation="fadeInUp" data-animation-delay="1.40s" >Buy Tokens <i class="ion-ios-arrow-thin-right"></i></a>
                            <ul class="icon_list list_none d-flex justify-content-center">
                            	<li class="animation" data-animation="fadeInUp" data-animation-delay="1.5s"><i class="fa fa-cc-visa"></i></li>
                                <li class="animation" data-animation="fadeInUp" data-animation-delay="1.6s"><i class="fa fa-cc-mastercard"></i></li>
                                <li class="animation" data-animation="fadeInUp" data-animation-delay="1.7s"><i class="fa fa-bitcoin"></i></li>
                                <li class="animation" data-animation="fadeInUp" data-animation-delay="1.8s"><i class="fa fa-paypal"></i></li>
                            </ul>                        
                        </div>
                	</div>
                </div>
				   <div class="banner_rounded_bg">
                	<img src="{{asset('assets/frontlending/images/rounded_bg.png') }}" alt="rounded_bg"/>
                </div>
          	</div>
       </div>
    </div>
    <div class="divider large_divider"></div>
    <div class="waveWrapper">
        <div class="wave waveTop"></div>
        <div class="wave waveMiddle"></div>
    </div>
</section>
<!-- END SECTION BANNER --> 

<!-- START SECTION ABOUT US -->
<section id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12">
            	<div class="text-center res_md_mb_30 res_sm_mb_20">
                	<img class="animation" data-animation="zoomIn" data-animation-delay="0.2s" src="{{asset('assets/frontlending/images/about_img10.png') }}" alt="aboutimg10"/>
                    <div class="video_text">
                    	<a href="{{$front->video}}" class="video bounceimg">
                        	<i class="ion-ios-play-outline gradient_box"></i>
                        </a>
                    </div> 
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 text_md_center">
                <div class="title_cyan_dark">
                  <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">About The ZIRCASH</h4>
                  <p class="animation" data-animation="fadeInUp" data-animation-delay="0.6s" style="text-align:justify;">There have been numerous cryptocurrencies in the market ever since the
crypto world came into existence. Zircash will prove to be a trendsetter among
all the other cryptocurrencies. The fact is that cryptocurrency trading is
prevailing these days. Many people are converting their hard earned incomes
into huge returns. Zircash is a trusted cryptocurrency also providing an
investment platform that works with smart contracts. Here, the investors can
expect exponential growth in their capitals and get best returns.</p>
                  <p class="animation" data-animation="fadeInUp" data-animation-delay="1s" style="text-align:justify;">Zircash assures a long term mutual benefit to all its associates. It is an
unprecedented platform which is undoubtedly going to excel with the ideas
par excellence.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION ABOUT US --> 

<!-- START SECTION How deposit platform works-->
<section id="how-it-works" class=" section_gradiant" data-z-index="1" data-parallax="scroll" data-image-src="{{asset('assets/frontlending/images/banner_bg3.png') }}">

  <div class="container">
         <div class="col-md-12 text-center mb-15 title_default_light">
		 <h4 class="animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.2s" style="animation-delay: 0.2s; opacity: 1;">MECHANISM OF ZIRCASH:</h4>
 <p class="animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.2s" style="animation-delay: 0.2s; opacity: 1;">Investment is no rocket science. Have a look!</p>       
	   </div>
<div class="row align-items-center">
                <div class="col-md-4 text-right">

                    <div class="howworks-step clearfix">

                        <div class="steps-content title_default_light">
                            <h4>Registration</h4>
                            <p>
                               Sign Up with ZIRCASH to get started.
                            </p>
                        </div>

                        <div class="steps-icon">
                            <img src="assets/frontlending/images/svg/add-user-icon.svg">
                        </div>


                    </div>

                    <div class="howworks-step clearfix">

                        <div class="steps-content title_default_light">
                            <h4>Verification</h4>
                            <p>
                                After registering, get verified 
                                <br>
                                via Email,SMS and KYC
                              
                             
                            </p>
                        </div>

                        <div class="steps-icon">
                            <img src="assets/frontlending/images/svg/secure-icon.svg">
                        </div>


                    </div>

                    <div class="howworks-step clearfix">

                        <div class="steps-content title_default_light">
                            <h4>Buy the Tokens/Coins</h4>
                            <p>
                                Purchase the Tokens/Coins by acceptable currencies. <br>
                            </p>
                        </div>
                        <div class="steps-icon">
                            <img src="assets/frontlending/images/svg/shopping-cart-solid.svg">
                        </div>
                    </div>
          </div>
                <div class="col-md-4 text-center bounceimg ">
                    <img src="assets/frontlending/images/banner_img4.png" class="img-responsive" style="display: inline-block; margin-top:20px;">

                </div>

                <div class="col-md-4 text-left how-it-works-step-right">

                    <div class="howworks-step clearfix">
                        <div class="steps-icon">
                            <img src="assets/frontlending/images/svg/money-bill-alt-solid.svg">
                        </div>
                        <div class="steps-content title_default_light">
                            <h4>Invest Your Purchase</h4>
                            <p>
                                Deposit Your Tokens/Coins with us to earn good returns.
                            </p>
                        </div>




                    </div>

                    <div class="howworks-step clearfix">
                        <div class="steps-icon">
                            <img src="assets/frontlending/images/svg/share-alt-square-solid.svg">
                        </div>
                        <div class="steps-content title_default_light">
                            <h4>Refers to friends</h4>
                            <p>
                               Refer Your Friends And Get Upto 5% Bonus
                            </p>
                        </div>
                    </div>
                    <div class="howworks-step clearfix">
                        <div class="steps-icon">
                            <img src="assets/frontlending/images/svg/sync-alt-solid.svg">
                        </div>
                        <div class="steps-content title_default_light">
                            <h4>Self-execution By Smart Contract</h4>
                            <p>
                               Self-execution of Contract After 30 Days of Initiation
                            </p>
                        </div>
                    </div>
                </div>
    </div>
	</div>
</section>
<!-- END SECTION  How deposit platform works --> 
<!-- START SECTION WHY CHOOSE US -->
<section id="why" class="bg_gray3">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12">
				<div class="title_cyan_dark text-center">
                  <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Why Choose Us?</h4>
                  <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">We believe that communication is the key to a good business. We serve our clients in the best of ways. Our focus is centralised on: EXPERIENCE, APPROACH and QUALITY.</p>
        		</div>
			</div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
            	<div class="box_wrap radius_box bg-white text-center animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                	<img src="assets/frontlending/images/wc_icon4.png" alt="wc_icon1"/>
                    <h4>Preferred Data Security</h4>
                    <p>Zircash is a highly safe and secured cryptocurrency that works under self executed smart contracts. It ensures that every transaction made is valid and acceptable.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
            	<div class="box_wrap radius_box bg-white text-center animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                	<img src="assets/frontlending/images/wc_icon5.png" alt="wc_icon2"/>
                    <h4>Decentralised</h4>
                    <p>Zircash has some special features that makes it stand out in the list of cryptocurrencies. It works on a completely decentralised network making it transparent and user-friendly.</p>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-3 col-sm-12">
            	<div class="box_wrap radius_box bg-white text-center animation" data-animation="fadeInUp" data-animation-delay="1s">
                	<img src="assets/frontlending/images/wc_icon6.png" alt="wc_icon3"/>
                    <h4>Peer To Peer Network</h4>
                    <p>Peer to peer network or a P2P network helps the sharing of files directly between systems on a network. Zircash makes it simpler when it comes to fetching information and executing it.</p>
                </div>
            </div>
    	</div>
  	</div>
</section>
<!-- END SECTION WHY CHOOSE US --> 

<!-- START SECTION TOKEN SALE -->
<section id="token" class="section_token section_gradiant3">
	<div class="container">
        <div class="row">
			<div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12">
                <div class="title_default_light text-center">
                    <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Token Structure</h4>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">Join the industry leaders to discuss where the markets are heading. We accept token payments. </p>
                </div>
			</div>
        </div>
        <div class="row align-items-center">
        	<div class="col-lg-3 col-sm-6">
            	<div class="bg-white-tran radius_box token_sale_box_white text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.2s">
                	<h5>Private Pre-Sale</h5>
                    <span>June 20, 2018</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
            	<div class="bg-white-tran radius_box token_sale_box_white text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                	<h5>Pre-Sale</h5>
                    <span>July 18, 2018</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
            	<div class="bg-white-tran radius_box token_sale_box_white text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                	<h5>Crowdsale</h5>
                    <span>February 20, 2018</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
            	<div class="bg-white-tran radius_box token_sale_box_white text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                	<h5>Acceptable Currency </h5>
                    <span>BTC, ETH, LTC</span>
                </div>
            </div>
        </div>
        <div class="divider large_divider"></div>
        <div class="row">
        	<div class="col-md-12">
            	<div class="title_default_light text-center">
                	<h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Affiliate System</h4>
                </div>
            </div>
        </div>
		<div class="row justify-content-center">
        	<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5">
            	<div class="bonus_box2 bonus_text_white bg-white-tran radius_box text-center animation" data-animation="fadeInUp" data-animation-delay="0.2s">
                	<div class="stage_title">
                    	<h5>Referral </h5>
                    </div>
                    <div class="bonus_info">
                        <h5>Get</h5>
                        <div class="discount_text"><span class="discount_num">5%</span> Bonus on Direct Referral</div>
                        <a href="signup.html">Join Now</a>
                    </div>
                </div>
            </div>
		</div>
   <!--     <div class="row justify-content-center">
        	<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            	<div class="bonus_box2 bonus_text_white bg-white-tran radius_box text-center animation" data-animation="fadeInUp" data-animation-delay="0.2s">
                	<div class="stage_title">
                    	<h5>Heading</h5>
                    </div>
                    <div class="bonus_info">
                        <h6>desc</h6>
                        <div class="discount_text"><span class="discount_num">95%</span> Discount</div>
                        <a href="#">btn</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            	<div class="bonus_box2 bonus_text_white bg-white-tran radius_box text-center animation" data-animation="fadeInUp" data-animation-delay="0.3s">
                	<div class="stage_title">
                    	<h5>Heading</h5>
                    </div>
                    <div class="bonus_info">
                        <h6>desc</h6>
                        <div class="discount_text"><span class="discount_num">60%</span> Discount</div>
                        <a href="#">btn</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            	<div class="bonus_box2 bonus_text_white bg-white-tran radius_box text-center animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                	<div class="stage_title">
                    	<h5>Heading</h5>
                    </div>
                    <div class="bonus_info">
                        <h6>desc</h6>
                        <div class="discount_text"><span class="discount_num">25%</span> Discount</div>
                        <a href="#">btn</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            	<div class="bonus_box2 bonus_text_white bg-white-tran radius_box text-center animation" data-animation="fadeInUp" data-animation-delay="0.5s">
                	<div class="stage_title">
                    	<h5>Heading</h5>
                    </div>
                    <div class="bonus_info">
                        <h6>desc</h6>
                        <div class="discount_text"><span class="discount_num">10%</span> Discount</div>
                        <a href="#">btn</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            	<div class="bonus_box2 bonus_text_white bg-white-tran radius_box text-center animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                	<div class="stage_title">
                    	<h5>Heading</h5>
                    </div>
                    <div class="bonus_info">
                        <h6>desc</h6>
                        <div class="discount_text"><span class="discount_num">5%</span> Discount</div>
                        <a href="#">btn</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            	<div class="bonus_box2 bonus_text_white bg-white-tran radius_box text-center animation" data-animation="fadeInUp" data-animation-delay="0.7s">
                	<div class="stage_title">
                    	<h5>Heading</h5>
                    </div>
                    <div class="bonus_info">
                        <h6>desc</h6>
                        <div class="discount_text"><span class="discount_num">0%</span> Discount</div>
                        <a href="#">btn</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</section>
<!-- END SECTION TOKEN SALE --> 

<!-- START SECTION TOKEN PROCEEDS & DISTRIBUTION -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 res_md_mb_40">
                <div class="title_cyan_dark text-center">
                    <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Token Sale Proceeds</h4>
                </div>
                <div class="lg_pt_30 res_sm_pt_0 text-center animation" data-animation="fadeInRight" data-animation-delay="0.2s"> 
            		<img  src="assets/frontlending/images/sale-proceeds7.png" alt="sale-proceeds7" /> 
            	</div>
			</div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="title_cyan_dark text-center">
                    <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Token Distribution</h4>
                </div>
                <div class="lg_pt_30 res_sm_pt_0 text-center animation" data-animation="fadeInLeft" data-animation-delay="0.2s"> 
                    <img  src="assets/frontlending/images/distribution7.png" alt="distribution7" /> 
                </div>
          </div>
        </div>    
	</div>
</section>
<!-- END SECTION TOKEN PROCEEDS & DISTRIBUTION --> 

<!-- START SECTION TIMELINE -->
<section id="roadmap" class="section_gradiant3" data-z-index="1" data-parallax="scroll" data-image-src="assets/images/roadmap_bg4.png">
    <div class="container">
    <div class="row text-center">
      <div class="col-lg-6 col-md-12 offset-lg-3">
        <div class="title_default_light text-center">
          <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Roadmap</h4>
          <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">The use of cryptocurrencies has become more widespread, The origin platform idea. Development of the concept and business plan.</p>
        </div>
      </div>
    </div>
    </div>
    <div class="container">
  	<div class="row">
    	<div class="col-md-12">
            <div class="roadmap_wrap owl-carousel small_space text-center">
             <div class="item">
                <div class="box_roadmap rd_complete">
                  <div class="roadmap_inner">
                  	<div class="roadmap_icon"></div>
                    <h6 class="animation" data-animation="fadeInUp" data-animation-delay="0.3s">Q2 (2018)</h6>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">PLANNING AND STRATEGY BUILDING <br>Analysis of market trends.Legal and technical studies.</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box_roadmap rd_complete">
                  <div class="roadmap_inner">
                  	<div class="roadmap_icon"></div>
                    <h6 class="animation" data-animation="fadeInUp" data-animation-delay="0.3s">Q3 (2018)</h6>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">TOKEN GENERATION EVENT <br>Generation of the token with all the needful formalities.</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box_roadmap ">
                  <div class="roadmap_inner">
                  	<div class="roadmap_icon"></div>
                    <h6 class="animation" data-animation="fadeInUp" data-animation-delay="0.3s">Q4 (2018)</h6>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">EXCHANGE LISTING <br>Listing of Zircash crypto coin officially on the trading
exchange platform using the required set of rules.</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box_roadmap">
                  <div class="roadmap_inner">
                  	<div class="roadmap_icon"></div>
                    <h6 class="animation" data-animation="fadeInUp" data-animation-delay="0.3s">Q1 (2019)</h6>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">LAUNCH OF ALPHA VERSION <br>The alpha version of the trading platform to be
launched. This supports the major cryptocurrency in a single terminal.</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box_roadmap">
                  <div class="roadmap_inner">
                  	<div class="roadmap_icon"></div>
                    <h6 class="animation" data-animation="fadeInUp" data-animation-delay="0.3s">Q2 (2019)</h6>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">CRYPTO BASED DEBIT CARDS <br>Launch of Crypto-based debit cards under Zircash
wallet services.</p>
                  </div>
                </div>
              </div>
               <div class="item">
                <div class="box_roadmap">
                  <div class="roadmap_inner">
                  	<div class="roadmap_icon"></div>
                    <h6 class="animation" data-animation="fadeInUp" data-animation-delay="0.3s">Q3 (2019)</h6>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">COLLABORATION WITH OTHER ENTITIES <br>Agreement distribution with international partners.</p>
                  </div>
                </div>
              </div>
            <!--  <div class="item">
                <div class="box_roadmap">
                  <div class="roadmap_inner">
                  	<div class="roadmap_icon"></div>
                    <h6 class="animation" data-animation="fadeInUp" data-animation-delay="0.3s">Aprile 2018</h6>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">Inotial Coin Distribution &amp; maketing</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box_roadmap">
                  <div class="roadmap_inner">
                  	<div class="roadmap_icon"></div>
                    <h6 class="animation" data-animation="fadeInUp" data-animation-delay="0.3s">October 2018</h6>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">Coin Marketcap, World Coin Index</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box_roadmap">
                  <div class="roadmap_inner">
                  	<div class="roadmap_icon"></div>
                    <h6 class="animation" data-animation="fadeInUp" data-animation-delay="0.3s">December 2018</h6>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">Online & Trading ICO Token Sale</p>
                  </div>
                </div>
              </div> -->
     </div>
    	</div>
    </div>
  </div>
</section> 
<!-- END SECTION TIMELINE -->
<!-- START SECTION TEAM 
<section id="team" class="team_box_s1 ">
    <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12 offset-lg-2">
            <div class="title_cyan_dark text-center">
              <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Our Team</h4>
              <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">we are proud of our great team. He is one of the most motivated and enthusiastic people we have, and is always ready and willing to help out where needed. </p>
            </div>
          </div>
        </div>
        <div class="row small_space">
            <div class="col-lg-3 col-md-6 col-sm-6 res_md_mb_30 res_sm_mb_20">
                <div class="team_box animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                    <div class="team_img rounded_img gradient_box text-center"> 
                    	<img src="assets/images/team1.jpg" alt="team1"/>
                    	<div class="social_team list_none">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="team_info text-center">
                        <h4><a href="#team1" class="content-popup">Derek Castro</a></h4>
                        <p>Head Of Marketing</p>
                    </div>
                    <div id="team1" class="team_pop mfp-hide">
                        <div class="row m-0">
                            <div class="col-md-4 text-center"> 
                            	<div class="team_img_wrap">
                                    <img class="w-100" src="assets/images/team-lg-1.jpg" alt="user_img-lg"/> 
                                    <div class="title_default_light  team_title">
                                        <h4>Derek Castro</h4>
                                        <span>Head Of Marketing</span>
                                    </div>
                                </div>
                                <div class="social_single_team list_none mt-3">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="pt-3">
                                    <h5>About</h5>
                                    <hr>
                                    <p>Founder of Venus Media Ltd and Owner of leading website for affiliates in the entertainment industry TakeBucks, he is a videographer, photographer and producer with a big number of successful entrepreneurships under his name over the last 18 years.</p>
                                    <h6><small class="text-uppercase">Blockchain</small> <small class="float-right">80%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Tokens Sale</small> <small class="float-right">90%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Market caps</small> <small class="float-right">70%</small></h6>
                                    <div class="progress">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 res_md_mb_30 res_sm_mb_20">
                <div class="team_box animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                    <div class="team_img rounded_img gradient_box text-center"> 
                    	<img src="assets/images/team2.jpg" alt="team2"/>
                    	<div class="social_team list_none">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="team_info text-center">
                        <h4><a href="#team2" class="content-popup">Jessica Bell</a></h4>
                        <p>Head Of Sale</p>
                    </div>
                    <div id="team2" class="team_pop mfp-hide">
                        <div class="row m-0">
                            <div class="col-md-4 text-center"> 
                            	<div class="team_img_wrap">
                                	<img class="w-100" src="assets/images/team-lg-2.jpg" alt="user_img-lg"/> 
                                    <div class="team_title"> 
                                        <h4>Jessica Bell</h4>
                                        <span>Head Of Sale</span>
                                    </div>
                                </div>
                                <div class="social_single_team list_none mt-3">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="pt-3">
                                    <h5>About</h5>
                                    <hr>
                                    <p>Founder of Venus Media Ltd and Owner of leading website for affiliates in the entertainment industry TakeBucks, he is a videographer, photographer and producer with a big number of successful entrepreneurships under his name over the last 18 years.</p>
                                    <h6><small class="text-uppercase">Blockchain</small> <small class="float-right">80%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Tokens Sale</small> <small class="float-right">90%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Market caps</small> <small class="float-right">70%</small></h6>
                                    <div class="progress">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 res_sm_mb_20">
                <div class="team_box animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                    <div class="team_img rounded_img gradient_box text-center"> 
                    	<img src="assets/images/team3.jpg" alt="team3"/>
                    	<div class="social_team list_none">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="team_info text-center">
                        <h4><a href="#team3" class="content-popup">Alvaro Martin</a></h4>
                        <p>Blockchain App Developer</p>
                    </div>
                    <div id="team3" class="team_pop mfp-hide">
                        <div class="row m-0">
                            <div class="col-md-4 text-center"> 
                            	<div class="team_img_wrap">
                                	<img class="w-100" src="assets/images/team-lg-3.jpg" alt="user_img-lg"/> 
                                    <div class="team_title"> 
                                        <h4>Alvaro Martin</h4>
                                        <span>Blockchain App Developer</span>
                                    </div>
                                </div>
                                <div class="social_single_team list_none mt-3">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        </ul>
                                    </div>
                            </div>
                            <div class="col-md-8">
                                <div class="pt-3">
                                    <h5>About</h5>
                                    <hr>
                                    <p>Founder of Venus Media Ltd and Owner of leading website for affiliates in the entertainment industry TakeBucks, he is a videographer, photographer and producer with a big number of successful entrepreneurships under his name over the last 18 years.</p>
                                    <h6><small class="text-uppercase">Blockchain</small> <small class="float-right">80%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Tokens Sale</small> <small class="float-right">90%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Market caps</small> <small class="float-right">70%</small></h6>
                                    <div class="progress">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 res_sm_mb_20">
                <div class="team_box animation" data-animation="fadeInUp" data-animation-delay="1s">
                    <div class="team_img rounded_img gradient_box text-center"> 
                    	<img src="assets/images/team4.jpg" alt="team4"/>
                    	<div class="social_team list_none">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="team_info text-center">
                        <h4><a href="#team4" class="content-popup">Maria Willium</a></h4>
                        <p>Community Manager</p>
                    </div>
                    <div id="team4" class="team_pop mfp-hide">
                        <div class="row m-0">
                            <div class="col-md-4 text-center">
                            	<div class="team_img_wrap">
                                	<img class="w-100" src="assets/images/team-lg-4.jpg" alt="user_img-lg"/>
                                    <div class="team_title"> 
                                        <h4>Maria Willium</h4>
                                        <span>Community Manager</span>
                                    </div>
                                </div>
                                <div class="social_single_team list_none mt-3">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        </ul>
                                    </div> 
                            </div>
                            <div class="col-md-8">
                                <div class="pt-3">
                                    <h5>About</h5>
                                    <hr>
                                    <p>Founder of Venus Media Ltd and Owner of leading website for affiliates in the entertainment industry TakeBucks, he is a videographer, photographer and producer with a big number of successful entrepreneurships under his name over the last 18 years.</p>
                                    <h6><small class="text-uppercase">Blockchain</small> <small class="float-right">80%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Tokens Sale</small> <small class="float-right">90%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Market caps</small> <small class="float-right">70%</small></h6>
                                    <div class="progress">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    	<div class="divider large_divider"></div>
        <div class="row">
          <div class="col-md-12">
            <div class="title_cyan_dark text-center">
              <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Invester Board</h4>
            </div>
          </div>
        </div>
        <div class="row small_space justify-content-center">
          <div class="col-lg-9 col-md-12">
            <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-6 res_md_mb_30 res_sm_mb_20">
                <div class="team_box animation" data-animation="fadeInUp" data-animation-delay="0.2s">
                    <div class="team_img rounded_img gradient_box text-center"> 
                    	<img src="assets/images/team5.jpg" alt="team5"/>
                    	<div class="social_team list_none">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="team_info text-center">
                        <h4><a href="#team5" class="content-popup">Tricia Diyana</a></h4>
                        <p>Invester</p>
                    </div>
                    <div id="team5" class="team_pop mfp-hide">
                        <div class="row m-0">
                            <div class="col-md-4 text-center"> 
                            	<div class="team_img_wrap">
                                	<img class="w-100" src="assets/images/team-lg-5.jpg" alt="user_img-lg"/>
                                    <div class="team_title"> 
                                        <h4>Tricia Diyana</h4>
                                        <span>Invester</span>
                                    </div> 
                                </div>
                                <div class="social_single_team list_none mt-3">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        </ul>
                                    </div>
                            </div>
                            <div class="col-md-8">
                                <div class="pt-3">
                                    <h5>About</h5>
                                    <hr>
                                    <p>Founder of Venus Media Ltd and Owner of leading website for affiliates in the entertainment industry TakeBucks, he is a videographer, photographer and producer with a big number of successful entrepreneurships under his name over the last 18 years.</p>
                                    <h6><small class="text-uppercase">Blockchain</small> <small class="float-right">80%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Tokens Sale</small> <small class="float-right">90%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Market caps</small> <small class="float-right">70%</small></h6>
                                    <div class="progress">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 res_md_mb_30 res_sm_mb_20">
                <div class="team_box animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                    <div class="team_img rounded_img gradient_box text-center"> 
                    	<img src="assets/images/team6.jpg" alt="team6"/>
                    	<div class="social_team list_none">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="team_info text-center">
                        <h4><a href="#team6" class="content-popup">Kent Pierce</a></h4>
                        <p>Invester</p>
                    </div>
                    <div id="team6" class="team_pop mfp-hide">
                        <div class="row m-0">
                            <div class="col-md-4 text-center"> 
                            	<div class="team_img_wrap">
                                	<img class="w-100" src="assets/images/team-lg-6.jpg" alt="user_img-lg"/>
                                    <div class="team_title"> 
                                        <h4>Kent Pierce</h4>
                                        <span>Invester</span>
                                    </div> 
                                </div>
                                <div class="social_single_team list_none mt-3">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        </ul>
                                    </div>
                            </div>
                            <div class="col-md-8">
                                <div class="pt-3">
                                    <h5>About</h5>
                                    <hr>
                                    <p>Founder of Venus Media Ltd and Owner of leading website for affiliates in the entertainment industry TakeBucks, he is a videographer, photographer and producer with a big number of successful entrepreneurships under his name over the last 18 years.</p>
                                    <h6><small class="text-uppercase">Blockchain</small> <small class="float-right">80%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Tokens Sale</small> <small class="float-right">90%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Market caps</small> <small class="float-right">70%</small></h6>
                                    <div class="progress">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-3 col-sm-6 offset-sm-3">
                <div class="team_box animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                    <div class="team_img rounded_img gradient_box text-center"> 
                    	<img src="assets/images/team7.jpg" alt="team7"/>
                    	<div class="social_team list_none">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="team_info text-center">
                        <h4><a href="#team7" class="content-popup">Rose Morgen</a></h4>
                        <p>Invester</p>
                    </div>
                    <div id="team7" class="team_pop mfp-hide">
                        <div class="row m-0">
                            <div class="col-md-4 text-center"> 
                            	<div class="team_img_wrap">
                                	<img class="w-100" src="assets/images/team-lg-7.jpg" alt="user_img-lg"/> 
                                	<div class="team_title"> 
                                        <h4>Rose Morgen</h4>
                                        <span>Invester</span>
                                    </div>
                                </div>
                                <div class="social_single_team list_none mt-3">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        </ul>
                                    </div>
                            </div>
                            <div class="col-md-8">
                                <div class="pt-3">
                                    <h5>About</h5>
                                    <hr>
                                    <p>Founder of Venus Media Ltd and Owner of leading website for affiliates in the entertainment industry TakeBucks, he is a videographer, photographer and producer with a big number of successful entrepreneurships under his name over the last 18 years.</p>
                                    <h6><small class="text-uppercase">Blockchain</small> <small class="float-right">80%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Tokens Sale</small> <small class="float-right">90%</small></h6>
                                    <div class="progress mb-3">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                    <h6><small class="text-uppercase">Market caps</small> <small class="float-right">70%</small></h6>
                                    <div class="progress">
                          				<div class="progress-bar progress-orange" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        			</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
<!-- END SECTION TEAM -->
<!-- SECTION WHITEPAPER -->
<section id="whitepaper" class="blue_dark wp_pattern">
	<div class="container">
    	<div class="row align-items-center">
            <div class="col-lg-5 col-md-12 col-sm-12">
                <div class="res_md_mb_50 res_sm_mb_20 text_md_center animation" data-animation="fadeInRight" data-animation-delay="0.2s"> 
                    <img src="assets/frontlending/images/whitepaper3.png" alt="whitepaper3"/> 
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12">
              <div class="title_default_light text_md_center">
                <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Download Whitepaper</h4>
                <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s" style="text-align:justify;">All those interested in buying a cryptocurrency might as well stay updated with the market trends. The price of Bitcoin remains afloat just over $6000 according to the current statistics. This is certainly a huge amount that has taken a leap from the initial amount which was $0.008. There are many who are predicting the future of what the price might head to but what is more important is the miles travelled to reach this point. The main motive of creating a whitepaper is to keep the customers aware of the terms and conditions and the policies of the issuing body. <br>Zircash is the newest cryptocurrency that is as affordable as Bitcoin was during its initial days. So all interested in investing in cryptocurrencies can blindly trust Zircash connecting with it and also avail the exclusive offers provided by it.</p>
              </div>
              <ul class="dl_lan list_none" > 
              	<li class="animation"  data-animation="fadeInUp" data-animation-delay="0.4s">
                      <a href="#" style="text-align: center;"><span>Download </span><i class="fa fa-download"></i></a></li>
              </ul>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION WHITEPAPER -->


<!-- START SECTION MOBILE APP 
<section id="mobileapp" class="section_gradiant3">
	<div class="container">
    	<div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 order-lg-first">
                <div class="res_md_mt_50 res_sm_mt_20 text-center animation" data-animation="fadeInLeft" data-animation-delay="0.2s"> 
                    <img src="assets/images/mobile_app8.png" alt="mobile_app8"/> 
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-12 order-first">
              <div class="title_default_light">
                <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Download Mobile App</h4>
                <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">The use of crypto-currencies has become more widespread, and they are now increasingly accepted as a legitimate currency for transactions.</p>
                <ul class="list_dash list_white">
                	<li class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">Different devices compatible</li>
                    <li class="animation" data-animation="fadeInUp" data-animation-delay="0.5s">Manage your Wallet</li>
                    <li class="animation" data-animation="fadeInUp" data-animation-delay="0.6s">Online Buy & Sell</li>
                    <li class="animation" data-animation="fadeInUp" data-animation-delay="0.7s">Stay with Friend</li>
                    <li class="animation" data-animation="fadeInUp" data-animation-delay="0.8s">Transformative technologies</li>
                    <li class="animation" data-animation="fadeInUp" data-animation-delay="0.9s">Reward & Bonus</li>
                </ul>
              </div>
              <div class="btn_group animation" data-animation="fadeInUp" data-animation-delay="1s"> 
              	<a href="#" class="btn btn-default btn-radius"><em class="ion-social-android"></em>Google Store </a> 
                <a href="#" class="btn btn-default btn-radius"><em class="ion-social-apple"></em>Apple Store</a> 
              </div>
            </div>
        </div>
    </div>
    <div class="waveWrapper">
        <div class="wave waveTop"></div>
        <div class="wave waveMiddle"></div>
    </div>
</section>
<!-- END SECTION MOBILE APP --> 

<!-- START SECTION FAQ -->
<section id="faq">
	<div class="container">
    	<div class="row">
        	<div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
              <div class="title_cyan_dark text-center">
                <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Frequently Asked Questions</h4>
                <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s"> Questions and Answers (Q&A), are listed questions and answers, all supposed to be commonly asked in some context</p>
              </div>
            </div>
        </div>
        <div class="row small_space">
        	<div class="col-lg-8 col-md-12 offset-lg-2">
            	<div class="tab_content">
                    <ul class="nav nav-pills tab_nav_s4 justify-content-center" id="pills-tab" role="tablist">
                      <li class="nav-item animation" data-animation="fadeInUp" data-animation-delay="0.5s">
                        <a class="active" data-toggle="tab" href="#tab1">General</a>
                      </li>
                      <li class="nav-item animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                        <a data-toggle="tab" href="#tab2">Pre-ICO & ICC </a>
                      </li>
                      <li class="nav-item animation" data-animation="fadeInUp" data-animation-delay="0.7s">
                        <a data-toggle="tab" href="#tab3">ICO Tokens</a>
                      </li>
                      <li class="nav-item animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                        <a data-toggle="tab" href="#tab4">Legal</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                            <div id="accordion1" class="faq_content4">
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                                  <div class="card-header" id="headingOne">
                                    <h6 class="mb-0"> <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is cryptocurrency?</a> </h6>
                                  </div>
                                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion1">
                                    <div class="card-body"> The best cryptocurrency to buy is one we are willing to hold onto even if it goes down. For example, I believe in Steem enough that I am willing to hold it even if it goes down 99% and would start buying more of it if the price dropped.</div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                                  <div class="card-header" id="headingTwo">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Which cryptocurrency is best to buy today?</a> </h6>
                                  </div>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
                                    <div class="card-body"> The best cryptocurrency to buy is one we are willing to hold onto even if it goes down. For example, I believe in Steem enough that I am willing to hold it even if it goes down 99% and would start buying more of it if the price dropped.</div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                                  <div class="card-header" id="headingThree">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How about day trading crypto?</a> </h6>
                                  </div>
                                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion1">
                                    <div class="card-body"> While profits are possible trading cryptocurrencies, so are losses. My first year involved me spending hundreds of hours trading Bitcoin with a result of losing over $5,000 with nothing to show for it. Simply trading digital currencies is very similar to gambling because no one really knows what is going to happen next although anyone can guess! While I was lucky to do nothing expect lose money when I started, the worst thing that can happen is to get lucky right away and get a big ego about what an amazing cryptocurrency trader we are. </div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="1s">
                                  <div class="card-header" id="headingFour">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">When to sell a cryptocurrency?</a> </h6>
                                  </div>
                                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion1">
                                    <div class="card-body"> Before Steem I was all in an another altcoin and really excited about it. When I first bought the price was low and made payments to me every week just for holding it. As I tried to participate in the community over the next several months, I was consistently met with a mix of excitement and hostility. When I began talking openly about this, the negative emotions won over in the community and in me. Originally I had invested and been happy to hold no matter what the price which quickly went up after I bought it. </div>
                                  </div>
                                </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                            <div id="accordion2" class="faq_content4">
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                                  <div class="card-header" id="headingFive">
                                    <h6 class="mb-0"> <a data-toggle="collapse" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">How does one acquire bitcoins?</a> </h6>
                                  </div>
                                  <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordion2">
                                    <div class="card-body"> While it may be possible to find individuals who wish to sell bitcoins in exchange for a credit card or PayPal payment, most exchanges do not allow funding via these payment methods. This is due to cases where someone buys bitcoins with PayPal, and then reverses their half of the transaction. This is commonly referred to as a chargeback.</div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                                  <div class="card-header" id="headingSix">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Can I make money with Bitcoin?</a> </h6>
                                  </div>
                                  <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion2">
                                    <div class="card-body"> You should never expect to get rich with Bitcoin or any emerging technology. It is always important to be wary of anything that sounds too good to be true or disobeys basic economic rules.</div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                                  <div class="card-header" id="headingSeven">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">What happens when bitcoins are lost?</a> </h6>
                                  </div>
                                  <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion2">
                                    <div class="card-body">When a user loses his wallet, it has the effect of removing money out of circulation. Lost bitcoins still remain in the block chain just like any other bitcoins. However, lost bitcoins remain dormant forever because there is no way for anybody to find the private key(s) that would allow them to be spent again. Because of the law of supply and demand, when fewer bitcoins are available, the ones that are left will be in higher demand and increase in value to compensate.</div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="1s">
                                  <div class="card-header" id="headingEight">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">Who controls the Bitcoin network?</a> </h6>
                                  </div>
                                  <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion2">
                                    <div class="card-body">Nobody owns the Bitcoin network much like no one owns the technology behind email. Bitcoin is controlled by all Bitcoin users around the world. While developers are improving the software, they can't force a change in the Bitcoin protocol because all users are free to choose what software and version they use.</div>
                                  </div>
                                </div>
                          </div>	
                        </div>
                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                            <div id="accordion3" class="faq_content4">
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                                  <div class="card-header" id="headingNine">
                                    <h6 class="mb-0"> <a data-toggle="collapse" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">How are bitcoins created?</a> </h6>
                                  </div>
                                  <div id="collapseNine" class="collapse show" aria-labelledby="headingNine" data-parent="#accordion3">
                                    <div class="card-body"> New bitcoins are generated by a competitive and decentralized process called "mining". This process involves that individuals are rewarded by the network for their services. Bitcoin miners are processing transactions and securing the network using specialized hardware and are collecting new bitcoins in exchange.</div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                                  <div class="card-header" id="headingTen">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">Why do bitcoins have value?</a> </h6>
                                  </div>
                                  <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion3">
                                    <div class="card-body">Bitcoins have value because they are useful as a form of money. Bitcoin has the characteristics of money (durability, portability, fungibility, scarcity, divisibility, and recognizability) based on the properties of mathematics rather than relying on physical properties (like gold and silver) or trust in central authorities (like fiat currencies). In short, Bitcoin is backed by mathematics. </div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                                  <div class="card-header" id="headingEleven">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">What determines bitcoin's price?</a> </h6>
                                  </div>
                                  <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion3">
                                    <div class="card-body"> The price of a bitcoin is determined by supply and demand. When demand for bitcoins increases, the price increases, and when demand falls, the price falls. There is only a limited number of bitcoins in circulation and new bitcoins are created at a predictable and decreasing rate</div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="1s">
                                  <div class="card-header" id="headingTwelve">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">Can bitcoins become worthless?</a> </h6>
                                  </div>
                                  <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordion3">
                                    <div class="card-body"> Yes. History is littered with currencies that failed and are no longer used, such as the German Mark during the Weimar Republic and, more recently, the Zimbabwean dollar.</div>
                                  </div>
                                </div>
                          </div>	
                        </div>
                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                            <div id="accordion4" class="faq_content4">
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                                  <div class="card-header" id="headingThirteen">
                                    <h6 class="mb-0"> <a data-toggle="collapse" href="#collapseThirteen" aria-expanded="true" aria-controls="collapseThirteen">Is Bitcoin legal?</a> </h6>
                                  </div>
                                  <div id="collapseThirteen" class="collapse show" aria-labelledby="headingThirteen" data-parent="#accordion4">
                                    <div class="card-body">To the best of our knowledge, Bitcoin has not been made illegal by legislation in most jurisdictions. However, some jurisdictions (such as Argentina and Russia) severely restrict or ban foreign currencies. Other jurisdictions (such as Thailand) may limit the licensing of certain entities such as Bitcoin exchanges.</div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                                  <div class="card-header" id="headingFourteen">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">Is Bitcoin useful for illegal activities?</a> </h6>
                                  </div>
                                  <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordion4">
                                    <div class="card-body">Bitcoin is money, and money has always been used both for legal and illegal purposes. Cash, credit cards and current banking systems widely surpass Bitcoin in terms of their use to finance crime. Bitcoin can bring significant innovation in payment systems and the benefits of such innovation are often considered to be far beyond their potential drawbacks.</div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                                  <div class="card-header" id="headingFifteen">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">Can Bitcoin be regulated?</a> </h6>
                                  </div>
                                  <div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen" data-parent="#accordion4">
                                    <div class="card-body"> The Bitcoin protocol itself cannot be modified without the cooperation of nearly all its users, who choose what software they use. Attempting to assign special rights to a local authority in the rules of the global Bitcoin network is not a practical possibility.</div>
                                  </div>
                                </div>
                                <div class="card animation" data-animation="fadeInUp" data-animation-delay="1s">
                                  <div class="card-header" id="headingSixteen">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">What about Bitcoin and taxes?</a> </h6>
                                  </div>
                                  <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen" data-parent="#accordion4">
                                    <div class="card-body"> Bitcoin is not a fiat currency with legal tender status in any jurisdiction, but often tax liability accrues regardless of the medium used. There is a wide variety of legislation in many different jurisdictions which could cause income, sales, payroll, capital gains, or some other form of tax liability to arise with Bitcoin.</div>
                                  </div>
                                </div>
                          </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION FAQ -->

<!-- START SECTION CONTACT -->
<section id="contact" class="contact_section bg_gray3">
	<div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            	<div class="title_cyan_dark">
                    <h4 class="animation mb-3" data-animation="fadeInUp" data-animation-delay="0.2s">Contact With Us</h4>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">If You have any questions? we're happy to help</p>
                </div>
            </div>
        </div>
        <div class="row small_space">
            <div class="col-lg-8 col-md-8">
                <form method="post" name="enq" class="field_form">
                    <div class="row">
                        <div class="form-group col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                            <input type="text" required="required" placeholder="Enter Name *" id="first-name" class="form-control" name="name">
                         </div>
                        <div class="form-group col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                            <input type="email" required="required" placeholder="Enter Email *" id="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                            <input type="text" required="required" placeholder="Enter Subject" id="subject" class="form-control" name="subject">
                        </div>
                        <div class="form-group col-md-6 animation" data-animation="fadeInUp" data-animation-delay="1s">
                            <input type="text" placeholder="Enter Phone No." id="phone" class="form-control" name="phone">
                        </div>
                        <div class="form-group col-md-12 animation" data-animation="fadeInUp" data-animation-delay="1.2s">
                            <textarea required="required" placeholder="Message *" id="description" class="form-control" name="message" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 animation" data-animation="fadeInUp" data-animation-delay="1.4s">
                            <button type="submit" title="Submit Your Message!" class="btn btn-default btn-radius" id="submitButton" name="submit" value="Submit">Submit <i class="ion-ios-arrow-thin-right"></i></button>
                        </div>
                        <div class="col-md-12">
                            <div id="alert-msg" class="alert-msg text-center"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-4">
                <ul class="list_none info_contact3 res_sm_mt_30 res_xs_mt_20">
                    <li class="animation" data-animation="fadeInUp" data-animation-delay="0.2s"> 
                        <i class="fa fa-globe"></i>
                        <div class="contact_detail">
                            <p>4 Montgomery, NY 12549 </p>
                        </div>
                    </li>
                
                    <li class="animation" data-animation="fadeInUp" data-animation-delay="0.6s"> 
                        <i class="fa fa-envelope"></i>
                        <div class="contact_detail">
                            <p>info@zircash.io</p>
                        </div>
                    </li>
                    <li class="animation" data-animation="fadeInUp" data-animation-delay="0.8s"> 
                        <i class="fa fa-send"></i>
                        <div class="contact_detail">
                            <p>Join us on Telegram</p>
                        </div>
                    </li>
              </ul>
            </div>
        </div>
	</div>
</section>
<!-- END SECTION CONTACT --> 

<!-- START CLIENTS SECTION 
<section class="client_logo">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
        		<div class="title_purple_dark text-center">
        			<h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Our Clients</h4>
        		</div>
        	</div>
        </div>
        <div class="row align-items-center text-center">
            <div class="col-lg-2 col-md-4 col-6">
            	<div class="banner_cl_logo animation" data-animation="fadeInUp" data-animation-delay="0.3s"> 
                	<img src="assets/images/client_logo_dark_gray1.png" alt="client_logo_dark_gray1" /> 
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
            	<div class="banner_cl_logo animation" data-animation="fadeInUp" data-animation-delay="0.4s"> 
                	<img src="assets/images/client_logo_dark_gray2.png" alt="client_logo_dark_gray2" /> 
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
            	<div class="banner_cl_logo animation" data-animation="fadeInUp" data-animation-delay="0.5s"> 
                	<img src="assets/images/client_logo_dark_gray3.png" alt="client_logo_dark_gray3" /> 
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
            	<div class="banner_cl_logo animation" data-animation="fadeInUp" data-animation-delay="0.6s"> 
                	<img src="assets/images/client_logo_dark_gray4.png" alt="client_logo_dark_gray4" /> 
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
            	<div class="banner_cl_logo animation" data-animation="fadeInUp" data-animation-delay="0.7s"> 
                	<img src="assets/images/client_logo_dark_gray5.png" alt="client_logo_dark_gray5" /> 
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
            	<div class="banner_cl_logo animation" data-animation="fadeInUp" data-animation-delay="0.8s"> 
                	<img src="assets/images/client_logo_dark_gray6.png" alt="client_logo_dark_gray6" /> 
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CLIENTS SECTION -->

<!-- START FOOTER SECTION -->
<footer>
	<div class="top_footer section_gradiant" data-z-index="1" data-parallax="scroll" data-image-src="assets/images/footer_bg.png">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-12">
                	<div class="newsletter_form">
                        <h4 class="footer_title border_title animation" data-animation="fadeInUp" data-animation-delay="0.2s">Newsletter</h4>
                        <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">By subscribing to our mailing list you will always be update with the latest news from us.</p>
                        <form class="subscribe_form animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                            <input id="subemail" class="input-rounded" type="text" required placeholder="Enter Email Address"/>
                          <button id="subsc" type="submit" title="Subscribe" class="btn-info" name="submit" value="Submit"> Subscribe </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-8 res_md_mt_30 res_sm_mt_20">
                	<h4 class="footer_title border_title animation" data-animation="fadeInUp" data-animation-delay="0.2s">Quick Links</h4>
                    <ul class="footer_link half_link list_none">
                    	<li class="animation" data-animation="fadeInUp" data-animation-delay="0.2s"><a class="page-scroll" href="">Login</a></li>
                        <li class="animation" data-animation="fadeInUp" data-animation-delay="0.3s"><a class="page-scroll" href="#team">Team</a></li>
                        <li class="animation" data-animation="fadeInUp" data-animation-delay="0.3s"><a class="page-scroll" href="#how-it-works">How It Works</a></li>
                        <li class="animation" data-animation="fadeInUp" data-animation-delay="0.3s"><a class="page-scroll" href="#whitepaper">Whitepaper</a></li>
                        <li class="animation" data-animation="fadeInUp" data-animation-delay="0.4s"><a class="page-scroll" href="#token">Tokens</a></li>
                        <li class="animation" data-animation="fadeInUp" data-animation-delay="0.5s"><a class="page-scroll" href="#faq">FAQ</a></li>
                        <li class="animation" data-animation="fadeInUp" data-animation-delay="0.3s"><a class="page-scroll" href="#roadmap">Road map</a></li>
                        <li class="animation" data-animation="fadeInUp" data-animation-delay="0.6s"><a class="page-scroll" href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-6 col-sm-4 res_md_mt_30 res_sm_mt_20">
                	<h4 class="footer_title border_title animation" data-animation="fadeInUp" data-animation-delay="0.2s">Social</h4>
                    <ul class="footer_social list_none">
                    	<li class="animation" data-animation="fadeInUp" data-animation-delay="0.2s"><a href="#"><i class="ion-social-facebook"></i> Facebook</a></li>
                        <li class="animation" data-animation="fadeInUp" data-animation-delay="0.3s"><a href="#"><i class="ion-social-twitter"></i> Twitter</a></li>
                        <li class="animation" data-animation="fadeInUp" data-animation-delay="0.4s"><a href="#"><i class="ion-social-googleplus"></i> Google Plus</a></li>
                        <li class="animation" data-animation="fadeInUp" data-animation-delay="0.5s"><a href="#"><i class="ion-social-pinterest"></i> Pintrest</a></li>
                        <li class="animation" data-animation="fadeInUp" data-animation-delay="0.6s"><a href="#"><i class="ion-social-instagram-outline"></i> Instagram</a></li>
                    </ul>
                </div>
                
      		</div>
    	</div>
    </div>
    <div class="bottom_footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="copyright">Copyright &copy; 2018 All Rights Reserved.</p>
        </div>
        <div class="col-md-6">
          <ul class="list_none footer_menu">
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
</footer>
<!-- END FOOTER SECTION --> 


<a href="#" class="scrollup btn-default"><i class="ion-ios-arrow-up"></i></a> 

<script>
  $(document).ready(function(){
    $(document).on('click','#subsc',function(e){
        e.preventDefault();
      var email = $('#subemail').val();
      $.ajax({
       type:'GET',
       url:'{{ route('subscribe') }}',
       data:{email:email},
       success:function(data){
        swal('success','Successfully Subscribed','success');
        console.log(data);
      },
      error:function (error) {
        var message = JSON.parse(error.responseText);
        swal('error',message.errors.email,'error');
        console.log(message.errors.email);

      }
    });
    });
  }); 
</script>
<!-- Latest jQuery --> 
<script src="assets/frontlending/js/jquery-1.12.4.min.js"></script> 
<!-- Latest compiled and minified Bootstrap --> 
<script src="assets/frontlending/js/popper.min.js"></script>
<script src="assets/frontlending/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="assets/frontlending/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="assets/frontlending/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="assets/frontlending/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="assets/frontlending/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="assets/frontlending/js/jquery.countdown.min.js"></script> 
<!-- particles min js  --> 
<script src="assets/frontlending/js/particles.min.js"></script> 
<!-- scripts js --> 
<script src="assets/frontlending/js/jquery.dd.min.js"></script> 
<!-- jquery.counterup.min js --> 
<script src="assets/frontlending/js/jquery.counterup.min.js"></script>
<!-- jquery.wavify js -->  
<script src="assets/frontlending/js/spop.min.js"></script> 
<script src="assets/frontlending/js/notification.js"></script> 
<!-- scripts js --> 
<script src="assets/frontlending/js/scripts.js"></script>

</body>
</html>