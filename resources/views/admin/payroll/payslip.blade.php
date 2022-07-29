@extends('admin.includes.master')
@section('title', 'Payroll')

@section('content')
<div class="main_content_iner">
    <div class="container-fluid">
      	<div class="order-section-chart ">
          	<div class="row">
	            <div class="col-lg-12 col-md-12 col-12 sec-45">
	                <div class="white_box">
	                   <div class="QA_section">
                            <div class="white_box_tittle list_header no-margin">
                                <h3 class="inner-order-head no-margin pad-bot-10">{{'Payroll: '.$payroll->month}}</h3>
                                <div class="add_button m-b-20 pad-top-10">
                                </div>
                            </div>
                            <hr>
                            <div class="QA_table restaurant-section">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" style="width:30%">Employee</th>
                                            <th scope="col" style="width:10%">Basic Salary</th>
                                            <th scope="col" style="width:15%">Bonus</th>
                                            <th scope="col" style="width:15%">Deduction</th>
                                            <th scope="col" style="width:15%">Net Payroll</th>
                                            <th scope="col" style="width:15%">Created at</th>
                                            <th scope="col" style="width:10%; text-align: right;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payslip as $key => $val)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    <div class="card-image">
                                                        <div class="user-tray">
                                                            <img src="{{URL::to('public/storage/users/'.$val->emp->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';" alt="Profile">
                                                            <p>{{$val->emp->firstname.' '.$val->emp->lastname}}</p>
                                                            <span>{{$val->emp->designation}}</span>
                                                        </div>
                                                    </div> 
                                                </td>
                                                <td>{{number_format($val->e_basic_salary)}}</td>
                                                <td>{{number_format($val->e_bonus)}}</td>
                                                <td>{{number_format($val->total_deduction)}}</td>
                                                <td><strong>{{number_format($val->net_salary)}}</strong></td>
                                                <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                                                <td style=" text-align: right;">
                                                    <a href="javascript:void(0)" class="btn btn-info btn-sm viewPayslip" data-id="{{base64_encode($val->id)}}">Payslip</a>
                                                </td>
                                            </tr>                               
                                        @endforeach
                                        @if(count($payslip) == 0)
                                            <tr>
                                                <td colspan="8">
                                                    No Records Found.
                                                </td>
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
    </div>
</div>



<div id="payslip-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-1" style="max-width:65% !important">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               
            </div>
        </div>
    </div>
</div>

@endsection