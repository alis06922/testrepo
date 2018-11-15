@extends('layouts.user')

@section('content')
<div class="row">
<div class="col-md-12">
  <div class="panel panel-inverse" data-sortable-id="index-1">
    <div class="panel-heading">
      <h4 class="panel-title"> Withdrawal Log</h4>
    </div>
    <div class="panel-body table-responsive">
     <table class="table table-striped">
     	<tr>
     		<th class=""> Withdrawal Address </th>
     		<th class=""> Amount</th>
               <th class="">Status</th>
               <th class="">Processed on</th>
     	</tr>
     	@foreach($withdrws1 as $with)
     	<tr>
            <td>{{$with->wdid}}</td>
            <td> {{$with->amount}} ZRS</td>
            <td>{{$with->detail}}</td>
            <td>{{$with->updated_at}}</td>
     	</tr>
     	@endforeach
     </table>
     {{$withdrws1 ->links()}}
   </div>
 </div>
</div>   
</div>

@endsection