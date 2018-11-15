@extends('admin.layout.master')
                         
@section('content')   
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    
                    <span class="caption-subject bold uppercase"> Referrals of  </span>
                </div>
         

            </div>
            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover order-column">
                <thead>
                    <tr>
                        <th>
                            Name 
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                             Phone
                        </th>                       
                        <th>
                            Upline
                        </th>                      
                        <th>
                            Total Referrals
                        </th>
                        <th>
                            Details
                        </th>
                     </tr>
                </thead>
                <tbody>
                @foreach($refers as $ref)
                     <tr>
                      <td>
                          {{$ref->name}}  
                        </td>
                        <td>
                            {{$ref->email}}      
                        </td> 
                        <td>
                            {{$ref->username}}      
                        </td>
                        <td>
                            {{$ref->mobile}}
                        </td>
                             @php
                            $count =  \App\User::where('refer', $ref->id)->count();
                            
                              if ($ref->refer != 0) 
                              $referby =  \App\User::where( 'id' ,$ref->refer )->first()->name;
                              else
                                $referby = 'None';
                            
                           @endphp
                        <td>
                            {{ $referby }}
                        </td>
                        <td>
                           {{  $count }} 
                           @if($count != '0')
                          <a href="{{route('user.referral', $ref->id)}}" class="btn btn-outline btn-circle btn-sm green">
                             <i class="fa fa-eye"></i> View List </a> 
                            @endif 
                           
                        </td>
                        <td>
                          <a href="{{route('user.single', $ref->id)}}" class="btn btn-outline btn-circle btn-sm green">
                             <i class="fa fa-eye"></i> View Info</a>
                        </td>
                     </tr>
      @endforeach 
      <tbody>
           </table>
           <?php echo $refers->render(); ?>
        </div>
      
      </div><!-- row -->
      </div>
    </div>
  </div>    
</div>
@endsection