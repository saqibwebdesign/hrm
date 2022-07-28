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
                                <h3 class="inner-order-head no-margin pad-bot-10">Payroll</h3>
                                <div class="add_button m-b-20 pad-top-10">
                                    <a href="javascript:void(0)" class="bg-yellow generatePayroll" data-href="{{route('admin.payroll.generate')}}">Generate</a>
                                </div>
                            </div>
                            <hr>
                            <div class="QA_table restaurant-section">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" style="width:15%">Month</th>
                                            <th scope="col" style="width:10%">Working Days</th>
                                            <th scope="col" style="width:15%">Total Payroll</th>
                                            <th scope="col" style="width:15%">Deduction</th>
                                            <th scope="col" style="width:15%">Net Payroll</th>
                                            <th scope="col" style="width:15%">Created at</th>
                                            <th scope="col" style="width:10%; text-align: right;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payroll as $key => $val)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$val->month}}</td>
                                                <td>{{$val->working_days}} days</td>
                                                <td>{{number_format($val->payroll)}}/-</td>
                                                <td>{{number_format($val->deduction)}}/-</td>
                                                <td><strong>{{number_format($val->net_payroll)}}/-</strong></td>
                                                <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                                                <td></td>
                                                <td style=" text-align: right;">
                                                </td>
                                            </tr>                               
                                        @endforeach
                                        @if(count($payroll) == 0)
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
            {{$payroll->links()}}
        </div>
    </div>
</div>
@endsection