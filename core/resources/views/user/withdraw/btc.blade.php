@extends('layouts.user')
@section('content')
<div class="row">

<div class="col-md-6">
<div class="panel panel-inverse">
	<div class="panel-heading">
		<h3 class="panel-title">Withdraw Zircash</h3>
	</div>
	<div class="panel-body">
		<div class="row">
		<div  class="col-md-12">
    <form method="POST" class="style:text-center;" action="{{ route('withdraw.btc') }}">
      {{csrf_field()}}
      
      <div class="form-group ">
            <label>Withdraw From</label>
            <select class="form-control" name="fromad" id="fromad">
             @foreach($adds1 as $add)
               <option  value="{{$add->id}}">{{$add->label}} | {{$add->address}}  |  {{round($add->balance,$gnl->decimal)}} {{$gnl->cursym}} </option>
              @endforeach
            </select>
          </div>
		<div class="form-group"> 
          
            <label>Amount</label>
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-5">
                    <div class="input-group">
                  <input type="text" name="amount" class="form-control" id="amount" required>
                  <span class="input-group-addon">
                    {{$gnl->cursym}}
                  </span>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12 text-center" >
                    <i class="fa fa-arrows-h" aria-hidden="true"></i>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-5">
                    <div class="input-group">
                     <input type="text" id="usd" class="form-control">
                      <span class="input-group-addon">USD</span>
                    </div>
                </div>
            </div>
          </div>
    <div class="from-group">
     <label>Ethereum Wallet Address</label>
        <input type="text" name="wallet"  class="form-control" placeholder="Your Ethereum Wallet address to Receive {{$gnl->cursym}}">
    </div>
    <hr/>
			<div class="form-group">
				<button class="btn btn-success btn-lg btn-block" type="submit">Confirm Withdraw</button>
			</div>		
		</form>
	
		</div>
		</div>
	
	</div>
</div>
</div>
<div class="col-md-6">
   @if($gnl->transaction==1)
  <div class="panel panel-inverse">
    <div class="panel-heading">
  
      <h4 class="panel-title">{{$gnl->cur}} Wallet Balance</h4>
    </div>
    <div class="panel-body table-responsive">
     <table class="table table-striped text-center">
      <tr>
        <th class="text-center">Label</th>
        <th class="text-center">Wallet Address</th>
        <th class="text-center">Balance</th>
       
      </tr>
      @foreach($adds1 as $add)
      <tr>
        <td>{{$add->label == '' ? 'No Label' : $add->label}}</td>
        <td>{{$add->address}}</td>
        <td>{{round($add->balance,$gnl->decimal)}} {{$gnl->cur}}</td>
      </tr>
      @endforeach
     </table>
   </div>
 
 </div>
</div> 
@endif  
</div>

<!-- change Send Value -->
<script type="text/javascript">
   $(document).ready(function()
   {
     $("#amount").keyup(function(){
       var data = $("#amount").val();
       var rate = {{$price}};
       var total = data*rate;
       $("#usd").val(total);
       });

     $("#usd").keyup(function(){
       var data = $("#usd").val();
       var rate = {{$price}};
       var total = data/rate;
       $("#amount").val(total);
       });

    });
</script>

@endsection