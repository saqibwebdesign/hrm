@extends('employee.includes.layout')
@section('title', 'Current Month | Payroll')
@section('content')

<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row"> 
      <div class="col-lg-12 col-md-12 col-12 section-3-1"> 
        <div class="row m-t-10">
          <div class="col-lg-6 col-md-6 col-12">
              <div class="section-3-2">
                  <h2 class="page-title-text2">Current Month - Payroll</h2>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            
          </div>
        </div>
        <div class="table-responsive modal-1 section-3-5 m-t-40 p-60">
          <div class="modal-body">
            <img src="{{URL::to('/public/employee')}}/assets/image/image10.png" alt="user">
            <p>Office: L-17/18 Sector 5C-4 North Karachi, Karachi, Pakistan <br>  Phone No: +92 333 2958824</p>
            <br>
            <div class="row">
              <div class="col-lg-2 col-md-6 col-3"> 
                <div class="modal-2">
                  <h3>Date of joining :</h3>
                  <h3>Pay Period :</h3>
                  <h3>Working Days  :</h3>
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-3"> 
                <div class="modal-3">
                  <p>{{date('d-M-Y', strtotime(Auth::user()->joining_date))}}</p>
                  <p>{{date('F Y')}}</p>
                  <p>
                    {{$workingDays}}
                  </p>
                </div>
              </div>
              <div class="col-lg-3"></div>
              <div class="col-lg-2 col-md-6 col-3"> 
                <div class="modal-2">
                  <h3>Employee Name :</h3>
                  <h3>Designation :</h3>
                  <h3>Department :</h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-3"> 
                <div class="modal-3">
                  <p>{{Auth::user()->firstname.' '.Auth::user()->lastname}}</p>
                  <p>{{Auth::user()->designation}}</p>
                  <p>{{Auth::user()->department->name}}</p>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-6">
                <table class="table">
                  <thead class=" modal-4">
                    <tr>
                      <th class="modal-5"><h1>Earnings</h1></th>
                      <th class="modal-6"><h1>Amount</h1></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $totalEarning = 0; @endphp
                    <tr class="modal-7">
                      <td class="modal-8"><h1>Basic Salary</h1></td>
                      <td class="modal-9"><h1>{{number_format($e_basic_salary)}}</h1></td>
                      @php $totalEarning += $e_basic_salary; @endphp
                    </tr>
                    <tr class="modal-7">
                      <td class="modal-8"><h1>Bonus</h1></td>
                      <td class="modal-9"><h1>{{number_format($e_bonus)}}</h1></td>
                      @php $totalEarning += $e_bonus; @endphp
                    </tr>
                    <tr class="modal-7">
                      <td class="modal-8"><h1>Allowance</h1></td>
                      <td class="modal-9"><h1>{{number_format($e_allowance)}}</h1></td>
                      @php $totalEarning += $e_allowance; @endphp
                    </tr>
                    <tr class="modal-7">
                      <td class="modal-8"><h1>Loan</h1></td>
                      <td class="modal-9"><h1>{{number_format($e_loan)}}</h1></td>
                      @php $totalEarning += $e_loan; @endphp
                    </tr>
                    <tr class="modal-7">
                      <td class="modal-8"><h1>&nbsp;</h1></td>
                      <td class="modal-9"><h1>&nbsp;</h1></td>
                    </tr>
                    <tr class="modal-7">
                      <td class="modal-8"><h1>&nbsp;</h1></td>
                      <td class="modal-9"><h1>&nbsp;</h1></td>
                    </tr>
                    <tr class="modal-10">
                      <td class="modal-8"><h1>Total Earnings</h1></td>
                      <td class="modal-9"><h1>{{number_format($totalEarning)}}</h1></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-6">
                <table class="table">
                  <thead class=" modal-4">
                    <tr>
                      <th class="modal-5"><h1>Deductions</h1></th>
                      <th class="modal-6"><h1>Amount</h1></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $totalDeduction = 0; @endphp
                    <tr class="modal-7">
                      <td class="modal-8"><a href="javascript:void(0)"  data-toggle="modal" data-target="#fullday_off"><h1>Fullday Off <small>({{$d_fullday_no}} days)</small></h1></a></td>
                      <td class="modal-9"><h1>{{number_format($d_fullday)}}</h1></td>
                      @php $totalDeduction += $d_fullday; @endphp
                    </tr>
                    <tr class="modal-7">
                      <td class="modal-8"><a href="javascript:void(0)"  data-toggle="modal" data-target="#halfday_off"><h1>Halfday Off <small>({{$d_halfday_no}} days)</small></h1></a></td>
                      <td class="modal-9"><h1>{{number_format($d_halfday)}}</h1></td>
                      @php $totalDeduction += $d_halfday; @endphp
                    </tr>
                    <tr class="modal-7">
                      <td class="modal-8"><a href="javascript:void(0)"  data-toggle="modal" data-target="#late_comming"><h1>Late Comming <small>({{$d_latecoming_no}} days)</small></h1></a></td>
                      <td class="modal-9"><h1>{{number_format($d_latecoming)}}</h1></td>
                      @php $totalDeduction += $d_latecoming; @endphp
                    </tr>
                    <tr class="modal-7">
                      <td class="modal-8"><h1>Loan</h1></td>
                      <td class="modal-9"><h1>{{number_format($d_loan)}}</h1></td>
                      @php $totalDeduction += $d_loan; @endphp
                    </tr>
                    <tr class="modal-7">
                      <td class="modal-8"><h1>Professional Tax</h1></td>
                      <td class="modal-9"><h1>0</h1></td>
                    </tr>
                    <tr class="modal-7">
                      <td class="modal-8"><h1>&nbsp;</h1></td>
                      <td class="modal-9"><h1>&nbsp;</h1></td>
                    </tr>
                    <tr class="modal-10">
                      <td class="modal-8"><h1>Total Deductions</h1></td>
                      <td class="modal-9"><h1>{{number_format($totalDeduction)}}</h1></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-6 col-4">
                <div class="modal-9">
                  <h1></h1>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-4">
                <div class="modal-9">
                  <h1></h1>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-4">
                <div class="modal-11">
                  <h1>Net Pay</h1>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-4">
                <div class="modal-11">
                  <h1>{{number_format($totalEarning-$totalDeduction)}}</h1>
                </div>
              </div>
            </div>

            <h4>This is system generated slip. no signature required.</h4>

          </div>
        </div>
      </div>  
    </div>   
  </div>
</div>

<div id="fullday_off" class="modal fade" role="dialog">
    <div class="modal-dialog modal-1" style="max-width:30% !important">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="padding-top: 0;">Fullday off Dates</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                      <table class="table table-striped">
                          @foreach($d_fullday_dates as $key => $val)
                          <tr>
                              <th>{{++$key}}</th>
                              <th>{{date('d-M-Y', strtotime($val))}}</th>
                          </tr>
                          @endforeach
                          @if(count($d_fullday_dates) == 0)
                            <tr>
                                <th colspan="2">No Dates Found.</th>
                            </tr>
                          @else
                            <tr>
                                <th colspan="2" class="text-right"><a href="{{route('employee.leaves')}}" class="btn btn-success">Apply For Leave</a></th>
                            </tr>
                          @endif
                      </table>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>

<div id="halfday_off" class="modal fade" role="dialog">
    <div class="modal-dialog modal-1" style="max-width:30% !important">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="padding-top: 0;">Halfday off Dates</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                      <table class="table table-striped">
                          @foreach($d_halfday_dates as $key => $val)
                          <tr>
                              <th>{{++$key}}</th>
                              <th>{{date('d-M-Y', strtotime($val))}}</th>
                          </tr>
                          @endforeach
                          @if(count($d_halfday_dates) == 0)
                            <tr>
                                <th colspan="2">No Dates Found.</th>
                            </tr>
                          @else
                            <tr>
                                <th colspan="2" class="text-right"><a href="{{route('employee.leaves')}}" class="btn btn-success">Apply For Leave</a></th>
                            </tr>
                          @endif
                      </table>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>

<div id="late_comming" class="modal fade" role="dialog">
    <div class="modal-dialog modal-1" style="max-width:30% !important">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="padding-top: 0;">Late Coming Dates</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                      <table class="table table-striped">
                          @foreach($d_latecoming_dates as $key => $val)
                          <tr>
                              <th>{{++$key}}</th>
                              <th>{{date('d-M-Y', strtotime($val))}}</th>
                          </tr>
                          @endforeach
                          @if(count($d_latecoming_dates) == 0)
                            <tr>
                                <th colspan="2">No Dates Found.</th>
                            </tr>
                          @else
                            <tr>
                                <th colspan="2" class="text-right"><a href="{{route('employee.leaves')}}" class="btn btn-success">Apply For Leave</a></th>
                            </tr>
                          @endif
                      </table>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('addScript')
<script type="text/javascript">
</script>
@endsection