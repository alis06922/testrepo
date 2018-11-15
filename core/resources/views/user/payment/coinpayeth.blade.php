@extends('layouts.user')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h3 class="panel-title">{{$pt}}</h3>
			</div>
			<div class="panel-body text-center">
				<h6> PLEASE SEND EXACTLY <span style="color: green;font-size:16px;font-weight:bold;"> {{ $bcoin }}</span> ETH</h6>
				<h5>TO <span style="color: green"> {{ $wallet}}</span></h5>
				{!! $qrurl !!}
				<h4 style="font-weight:bold;">SCAN TO SEND</h4>	
				 <div class="alert alert-info" style="color:white;font-size:18px;"><b> We'll notify you, Once your transaction confirmed on Blockchain. <b>
				</div>						
			</div>
		</div>
	</div>
</div>

@endsection