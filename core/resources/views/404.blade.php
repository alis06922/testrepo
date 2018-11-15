@extends('layouts.app')

@section('content')
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"+vsHr1WyR620WR", domain:"zircash.io",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://certify-js.alexametrics.com/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://certify.alexametrics.com/atrk.gif?account=+vsHr1WyR620WR" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->  
{{-- @php $front = \App\Frontend::first(); @endphp --}}
<section class="contact-section contact-bg" id="contact" style="background-image: url({{asset('assets/images/logo/bc.jpg')}});">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="contact-form-wrapper text-center">
                	 <h3 style="color: #cc0000;">Sorry! Page Not Found</h3>
                	 <h4><a href="{{route('home')}}">Back To Home</a></h4>
               	</div>
            </div>
        </div>
    </div>
</section>
@endsection