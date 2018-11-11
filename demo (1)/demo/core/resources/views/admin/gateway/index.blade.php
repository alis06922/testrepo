@extends('admin.layout.master')

@section('page_styles')
<link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
<div class="col-md-12">
<div class="portlet light bordered">
<div class="portlet-title">
<div class="caption font-red-sunglo">
<i class="icon-settings font-red-sunglo"></i>
<span class="caption-subject bold uppercase">Payment Gateways</span>
</div>
</div>
<div class="portlet-body">
<div class="row">
    @foreach($gateways as $gateway)
    <div class="col-md-3" style="margin-top:10px;">
        <div class="panel text-white {{$gateway->status==1?'panel-primary':'panel-warning'}}">
            <div class="panel-heading text-center">
                {{$gateway->main_name}}
            </div>
            <div class="panel-body">
                <form method="post" action="{{route('gateway.update', $gateway)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="form-group text-center">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                <img src="{{ asset('assets/images/gateway') }}/{{$gateway->id}}.jpg" alt="*" /> 
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;"> 
                            </div>
                            <div>
                                <span class="btn btn-success btn-file">
                                    <span class="fileinput-new"> Change Logo </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="gateimg"> 
                                </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{ $gateway->status == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $gateway->status == "0" ? 'selected' : '' }}>Deactive</option>
                        </select>
                    </div>
                    <button class="btn btn-info btn-block btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample{{$gateway->id}}" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-eye"></i> DETAILS
                    </button>
                    <div class="collapse" id="collapseExample{{$gateway->id}}">
                        <hr/>
                        <div class="form-group">
                            <label>Name of Gateway</label>
                            <input type="text" value="{{$gateway->name}}" class="form-control" id="name" name="name" >
                        </div>
                        <div class="form-group">
                            <label>Rate</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    1 USD =
                                </span>
                                <input type="text" value="{{$gateway->rate}}" class="form-control" id="rate" name="rate" >
                                <span class="input-group-addon">
                                    {{ $gnl->cur }}
                                </span>
                            </div>
                        </div>
                        <hr/>
                        <div class="panel panel-info text-center">
                            <div class="panel-heading">
                                Deposit Limit
                            </div>
                            <div class="panel-body">
                                
                                <div class="form-group">
                                    <label for="minamo">Minimum Amount</label>
                                    <div class="input-group">
                                        <input type="text" value="{{$gateway->minamo}}" class="form-control" id="minamo" name="minamo" >
                                        <span class="input-group-addon">
                                            {{ $gnl->cur }}
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="maxamo">Maximum Amount</label>
                                    <div class="input-group">
                                        <input type="text" value="{{$gateway->maxamo}}" class="form-control" id="maxamo" name="maxamo" >
                                        <span class="input-group-addon">
                                            {{ $gnl->cur }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <hr/>
                        <div class="panel text-center panel-info">
                            <div class="panel-heading">
                                Deposit Charge
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="chargefx">Fixed Charge</label>
                                    <div class="input-group">
                                        <input type="text" value="{{$gateway->fixed_charge}}" class="form-control" id="chargefx" name="fixed_charge" >
                                        <span class="input-group-addon">
                                            {{ $gnl->cur }}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="chargepc">Charge in Percentage</label>
                                    <div class="input-group">
                                        <input type="text" value="{{$gateway->percent_charge}}" class="form-control" id="chargepc" name="percent_charge" >
                                        <span class="input-group-addon">
                                            {{ $gnl->cur }}
                                        </span>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <hr/>
                        @if($gateway->id==101)
                        <div class="form-group">
                            <label for="val1">PAYPAL BUSINESS EMAIL</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        @elseif($gateway->id==102)
                        <div class="form-group">
                            <label for="val1">PM USD ACCOUNT</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">ALTERNATE PASSPHRASE</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        
                        @elseif($gateway->id==103)
                        <div class="form-group">
                            <label for="val1">SECRET KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">PUBLISHABLE KEY</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==104)
                        <div class="form-group">
                            <label for="val1">Marchant Email</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">Secret KEY</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==501)
                        <div class="form-group">
                            <label for="val1">API KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">XPUB CODE</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==502)
                        <div class="form-group">
                            <label for="val1">API KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">API PIN</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==503)
                        <div class="form-group">
                            <label for="val1">API KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">API PIN</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==504)
                        <div class="form-group">
                            <label for="val1">API KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">API PIN</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==505)
                        <div class="form-group">
                            <label for="val1">Public  KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">Private KEY</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==506)
                        <div class="form-group">
                            <label for="val1">Public  KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">Private KEY</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==507)
                        <div class="form-group">
                            <label for="val1">Public  KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">Private KEY</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==508)
                        <div class="form-group">
                            <label for="val1">Public  KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">Private KEY</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==509)
                        <div class="form-group">
                            <label for="val1">Public  KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">Private KEY</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==510)
                        <div class="form-group">
                            <label for="val1">Public  KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        <div class="form-group">
                            <label for="val2">Private KEY</label>
                            <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                        </div>
                        @elseif($gateway->id==512)
                        <div class="form-group">
                            <label for="val1">API  KEY</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        @elseif($gateway->id==513)
                        <div class="form-group">
                            <label for="val1">Merchant ID</label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        @else
                        <div class="form-group">
                            <label for="val1"><storng>Payment Details</storng></label>
                            <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                        </div>
                        @endif
                        
                        @if($gateway->id < 100 || $gateway->id==101)
                        <div class="form-group" style="height:65px;">
                        </div>
                        @endif
                    </div>
                    
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>				
    </div>   
    @endforeach
</div>
</div>
</div>
</div>
</div>
@endsection
@section('page_scripts')
<script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}"></script>
@endsection
