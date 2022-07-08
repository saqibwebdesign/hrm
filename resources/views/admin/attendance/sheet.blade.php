@extends('admin.includes.master')
@section('title', 'Attendance Sheet')
@section('content')
<style type="text/css">
.user-tray img {
    width: 25px;
    height: 25px;
    margin-bottom: -30px;
    border-radius: 5%;
    margin-left: -34px;
    margin-bottom: -46px;
}
.white_box table tr td p {    
    font-size: 14px !important;
    line-height: 17px;
    color: #000;
}
.user-tray {
    padding-left: 30px;
}
.white_box .table thead th {
    padding: 12px 12px;
}
</style>
<div class="main_content_iner">
    <div class="container-fluid">
      	<div class="order-section-chart ">
          	<div class="row">
	            <div class="col-lg-12 col-md-12 col-12 sec-45">
	                <div class="white_box">
                        <h4>Month: {{date('F-Y')}}</h4>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="10">Employee</th>
                                    @for($i=1; $i<=31; $i++)
                                        <th style="width:10px">{{$i}}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $key => $val)
                                    <tr>
                                        <td>
                                            <div class="card-image">
                                                <div class="user-tray">
                                                    <img src="{{URL::to('public/storage/users/'.$val['profile_img'])}}" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';" alt="Profile">
                                                    <p>{{$val['name']}}</p>
                                                </div>
                                            </div> 
                                        </td>
                                        @for($i=1; $i<=31; $i++)
                                            <td>
                                                @if(date('l', strtotime(date('Y-m-'.$i))) == 'Sunday')
                                                    <i class="fa fa-star text-warning"></i>
                                                @else
                                                    @php $holi = 0; @endphp
                                                    @foreach($holiday as $hol)
                                                        @if($hol->date == date('Y-m-'.sprintf("%02d", $i)))
                                                            @php $holi = 1; @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($holi == 1)
                                                        <i class="fa fa-star text-warning"></i>
                                                    @else
                                                        @if(strtotime(date('Y-m-'.$i)) > strtotime(date('Y-m-d')))
                                                            -
                                                        @else
                                                            @php $present = 0 @endphp
                                                            @foreach($val['clock_in'] as $clIn)
                                                                @if(date('Y-m-d', strtotime($hol->clIn)) == date('Y-m-'.sprintf("%02d", $i)))
                                                                    @php $present = 1; @endphp
                                                                @endif
                                                            @endforeach 
                                                            @if($present == 1)
                                                                <i class="fa fa-check-circle text-success"></i>
                                                            @else
                                                                <i class="fa fa-times text-danger"></i>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            </td>
                                        @endfor
                                    </tr>                               
                                @endforeach
                                @if(count($employees) == 0)
                                    <tr>
                                        <td colspan="7">&nbsp;&nbsp;&nbsp;No Employee found.</td>
                                    </tr>
                                @endif             
                            </tbody>
                        </table>                  		
	                </div>
	            </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('addStyle')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('addScript')
@endsection