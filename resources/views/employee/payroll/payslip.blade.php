@extends('employee.includes.layout')
@section('title', 'Payslip | Payroll')
@section('content')

<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row"> 
      <div class="col-lg-12 col-md-8 col-12 section-3-17"> 
        <div class="row">
          <div class="col-lg-10 col-md-6 col-12">
              <div class="section-3-2">
                  <h2>Payslip</h2>
              </div>
          </div>
          <div class="col-lg-2 col-md-6 col-12">
              <div class="row">
                  <div class="col-lg-12 col-md-6 col-12 no-pad">
                      <div class="section-3-3">
                         
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="table-responsive section-3-5">
            <table class="table">
              <thead class="thead-dark section-3-20">
                  <tr>
                      <th scope="col">S.no</th>
                      <th scope="col">Month</th>
                      <th scope="col">Gross Salary</th>
                      <th scope="col">Bonus</th>
                      <th scope="col">Deduction</th>
                      <th scope="col">Net Salary</th>
                      <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($payslip as $key => $val)
                  <tr class="section-3-7">
                     <td>{{++$key}}</td>
                     <td>{{@$val->payroll->month}}</td>
                     <td>{{number_format($val->e_basic_salary)}}/-</td>
                     <td>{{number_format($val->e_bonus)}}/-</td>
                     <td>{{number_format($val->total_deduction)}}/-</td>
                     <td><strong>{{number_format($val->net_salary)}}/-</strong></td>                     
                     <td>
                        <a  href="javascript:void(0)" class="viewPayslip" data-href="{{route('employee.payroll.payslip.detail',base64_encode($val->id))}}">
                          Payslip
                        </a>
                      </td>
                  </tr>
                @endforeach
                @if(count($payslip) == 0)
                  <tr>
                    <td colspan="7">No Record Found.</td>
                  </tr>
                @endif
              </tbody>
          </table>
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
@section('addScript')
<script type="text/javascript">
</script>
@endsection