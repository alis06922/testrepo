@extends('layouts.user')

@section('content')
@if($gnl->ico==1)
<div class="row">
    <div class="col-md-12">
       <div class="panel panel-inverse">
                <div class="panel-heading">
                   <h4 class="panel-title">ICO Calender</h4>
                </div>
            <div class="panel-body">
        @foreach($nexts as $next)
       
            <div class="col-md-4">
                <div class="panel panel-{{$next->status == 1? 'success': 'inverse'}}">
                        <div class="panel-heading">
                           <h4 class="panel-title">{{$next->status == 1? 'Runing': 'Upcoming'}} ICO 
                           </h4>
                        </div>
                        <div class="panel-body text-center">
                            <ul class="list-group">
                                <li class="list-group-item">Price: <strong>{{$next->price}} USD</strong></li>
                                <li class="list-group-item">Start At: <strong>{{$next->start}}</strong></li>
                                <li class="list-group-item">End At: <strong>{{$next->end}}</strong></li>
                                <li class="list-group-item">Total Quantity: <strong>{{$next->quant}} {{$gnl->cur}}</strong></li>
                                <li class="list-group-item">Sold: <strong>{{$next->sold}} {{$gnl->cur}}</strong></li>
                                <li class="list-group-item">
                                      <div class="progress">
                                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{round(($next->sold/$next->quant)*100,2)}}"
                                      aria-valuemin="0" aria-valuemax="100" style="width:{{round(($next->sold/$next->quant)*100,2)}}%">
                                      </div>
                                    </div>
                                    <span style="color:#0066cc;">{{round(($next->sold/$next->quant)*100,2)}}% Sold</span>
                                </li>
                            </ul>
                        </div>
                         @if($next->status==1)
                          <div class="panel-footer text-center">
                                <a class="btn btn-success btn-lg btn-block" href="{{route('buy.ico')}}">Purchase Now</a>
                            </div>
                          @else
                          <div class="panel-footer text-center">
                                <a class="btn btn-warning btn-lg btn-block disabled" href="#">Coming...</a>
                            </div>
                        @endif
                    </div>
            </div>
        @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@if($gnl->transaction==1)

<div class="row">
<div class="col-md-12">
  <div class="panel panel-inverse">
    <div class="panel-heading">
      <div class="panel-heading-btn">
        <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#newaddress"><i class="fa fa-plus"></i> New Wallet</button>
      </div>
      <h4 class="panel-title">{{$gnl->cur}} Wallet Addresses</h4>
    </div>
    <div class="panel-body table-responsive">
     <table class="table table-striped text-center">
      <tr>
        <th class="text-center">Label</th>
        <th class="text-center">Wallet Address</th>
        <th class="text-center">Balance</th>
       
      </tr>
      @foreach($adds as $add)
      <tr>
        <td>{{$add->label == '' ? 'No Label' : $add->label}}</td>
        <td>{{$add->address}}</td>
        <td>{{round($add->balance,$gnl->decimal)}} {{$gnl->cur}}</td>
      </tr>
      @endforeach
     </table>
   </div>
   <div class="panel-footer">
         <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#sendmoney"><i class="fa fa-upload" aria-hidden="true"></i> Send </button>
        <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#request" id="request-button"><i class="fa fa-download" aria-hidden="true"></i> Receive </button>
     <a href="{{ route('all.wallets') }}" class="btn btn-info pull-right">All Wallets</a>

   </div>
 </div>
</div>   
</div>

<!-- Create Address -->
<div id="newaddress" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New Wallet</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('create.address') }}">
          {{csrf_field()}}
          <div class="form-group">
            <label>Label</label>
            <input type="text" name="label" class="form-control" placeholder="Optional.Eg: My Wallet">
          </div>
          <div class="form-group">
            <button class="btn btn-success btn-block btn-lg" type="submit">Create</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Send Money -->
<div id="sendmoney" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send {{$gnl->cursym}} <p class="alert alert-info"> <strong>Info!</strong> Valid only for Internal Transfers</p></h4>
      </div>
      <div class="modal-body text-center">
        <form action="{{route('send.money')}}" method="POST">
          {{csrf_field()}}
          <div class="form-group">
            <label>Send From</label>
            <select class="form-control" name="fromad" id="fromad">
             @foreach($adds as $add)
               <option  value="{{$add->id}}">{{$add->label}} | {{$add->address}}  |  {{round($add->balance,$gnl->decimal)}} {{$gnl->cursym}} </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>To</label>
            <input type="text" name="toadd" id="toadd" class="form-control input-sz" placeholder="Enter Recipient Wallet Address" required>
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
                <div class="col-md-2 col-sm-12 col-xs-12">
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
          
          <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block">
              Send {{$gnl->cur}}
            </button>
          </div>
        </form>

      </div>

    </div>

  </div>
</div>

<!-- Request Modal -->
<div id="request" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Receive {{$gnl->cursym}} <p class="alert alert-info"> <strong>Info!</strong> Valid only for Internal Transfers</p></h4>
      </div>
      <div class="modal-body text-center">
         <div class="form-group">
            <label>Receive To</label>
            <select class="form-control" name="toacc" id="toacc">
              @foreach($adds as $add)
               <option  value="{{$add->id}}">{{$add->label}} | {{$add->address}} |  {{round($add->balance,$gnl->decimal)}} {{$gnl->cursym}} </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Amount</label>
             <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-5">
                 <div class="input-group">
                  <input type="text" id="coinamount" name="coinamount" class="form-control" id="btcamount" required>
                  <span class="input-group-addon">
                    {{$gnl->cur}}
                  </span>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12">
             
                    <i class="fa fa-arrows-h" aria-hidden="true"></i>
                  </div>
                <div class="col-sm-12 col-xs-12 col-md-5">
                   <div class="input-group">
                    <input type="text" id="usdamount" class="form-control">
                    <span class="input-group-addon">USD</span>
                 </div>
            </div>
          </div>
          <hr/>
        <p>Get this code to Request {{$gnl->cursym}}</p>
        <p id="qrcode" style="min-height:300px; min-width:300px;">Enter Amount to Get Code</p>
        <div class="form-group">
          <div class="input-group">
          <input id="code" placeholder="Enter Amount to Get Code" class="form-control input-lg">
          <span class="btn btn-success input-group-addon" id="copybtn">Copy</span>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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

<!-- change Receive Value -->
<script type="text/javascript">
   $(document).ready(function()
   {
     $("#coinamount").keyup(function(){
       var rdata = $("#coinamount").val();
       var rrate = {{$price}};
       var rtotal = rdata*rrate;
       $("#usdamount").val(rtotal);
       });

     $("#usdamount").keyup(function(){
       var rudata = $("#usdamount").val();
       var rurate = {{$price}};
       var rutotal = rudata/rurate;
       $("#coinamount").val(rutotal);
       });
    });
</script>

<!-- Receive Code -->
<script type="text/javascript">
  $(document).ready(function(){

    $("#toacc").change(function()
    {
        var toaccount = $( "#toacc" ).val();
        var coinamo = $("#coinamount").val();
        getQrCode(toaccount,coinamo);
    });

     $("#coinamount").keyup(function()
     {
          var toaccount = $( "#toacc" ).val();
          var coinamo = $("#coinamount").val();
          getQrCode(toaccount,coinamo);
    }); 
     
    $("#usdamount").keyup(function()
     {
          var toaccount = $( "#toacc" ).val();
          var coinamo = $("#coinamount").val();
          getQrCode(toaccount,coinamo);
    });
     
    function getQrCode(toaccount, coinamo)
      {
          $.ajax({
               type:'GET',
               url:'{{ route('receive.money') }}',
                data:
              {
                'toacc':toaccount,
                'coinamount':coinamo
              },
               success:function(data)
               {
                  console.log(data);
                  $('#qrcode').html(data.qcode);
                  $('#code').val(data.code);
               },
              error:function(res){
                $('#code').text('Enter Valid Amount and Wallet ID');
              }
          });
      }
  });
</script>

<!--Copy Address -->
<script type="text/javascript">
  document.getElementById("copybtn").onclick = function()
  {
    document.getElementById('code').select();
    document.execCommand('copy');
  }
</script>

@endif


@endsection

