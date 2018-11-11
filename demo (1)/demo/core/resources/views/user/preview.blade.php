@extends('layouts.user')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
  <div class="panel panel-inverse">
    <div class="panel-heading">
      <h4 class="panel-title">Preview of {{$gnl->cur}} Purchase</h4>
    </div>
    <div class="panel-body table-responsive text-center">
       <ul class="list-group">
          <li class="list-group-item">
            <h6>Payment Gateway</h6>
            <img src="{{asset('assets/images/gateway')}}/{{$data->gateway_id}}.jpg" style="max-width:100px; max-height:100px; margin:0 auto;"/>
          </li>
       		<li class="list-group-item"><h3>{{$gnl->cur}} Amount: <strong>{{$data->amount}}</strong> {{$gnl->cursym}}</h3></li>
       		<li class="list-group-item"><h3>{{$gnl->cur}} Price: <strong>{{$price}}</strong> USD</h3></li>
       		<li class="list-group-item"><h3>Total Payable: <strong>{{$data->usd_amo}}</strong> USD</h3></li>
       </ul>
   </div>
   <div class="panel-footer">
   	<a class="btn btn-success btn-lg btn-block" href="{{route('buy.confirm')}}">
   		Pay Now
   	</a>
   </div>
 </div>
</div> 
</div>
@endsection
