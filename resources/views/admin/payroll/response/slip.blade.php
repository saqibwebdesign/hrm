 <img src="{{URL::to('/public/employee')}}/assets/image/image10.png" alt="user">
    <p>Office: L-17/18 Sector 5C-4 North Karachi, Karachi, Pakistan <br>  Phone No: +92 333 2958824</p>
    <br>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-3"> 
        <div class="modal-2">
          <h3>Date of joining :</h3>
          <h3>Pay Period :</h3>
          <h3>Working Days  :</h3>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 col-3"> 
        <div class="modal-3">
          <p>{{date('d-M-Y', strtotime($payslip->emp->joining_date))}}</p>
          <p>{{$payslip->payroll->month}}</p>
          <p>
            {{$payslip->payroll->working_days}}
          </p>
        </div>
      </div>
      <div class="col-lg-2"></div>
      <div class="col-lg-2 col-md-6 col-3"> 
        <div class="modal-2">
          <h3>Employee Name :</h3>
          <h3>Designation :</h3>
          <h3>Department :</h3>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-3"> 
        <div class="modal-3">
          <p>{{$payslip->emp->firstname.' '.$payslip->emp->lastname}}</p>
          <p>{{$payslip->emp->designation}}</p>
          <p>{{$payslip->emp->department->name}}</p>
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
            <tr class="modal-7">
              <td class="modal-8"><h1>Basic Salary</h1></td>
              <td class="modal-9"><h1>{{number_format($payslip->e_basic_salary)}}</h1></td>
            </tr>
            <tr class="modal-7">
              <td class="modal-8"><h1>Bonus</h1></td>
              <td class="modal-9"><h1>{{number_format($payslip->e_bonus)}}</h1></td>
            </tr>
            <tr class="modal-7">
              <td class="modal-8"><h1>Allowance</h1></td>
              <td class="modal-9"><h1>{{number_format($payslip->e_allowance)}}</h1></td>
            </tr>
            <tr class="modal-7">
              <td class="modal-8"><h1>Loan</h1></td>
              <td class="modal-9"><h1>{{number_format($payslip->e_loan)}}</h1></td>
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
              <td class="modal-9"><h1>{{number_format($payslip->total_earning)}}</h1></td>
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
            <tr class="modal-7">
              <td class="modal-8"><h1>Fullday Off</h1></td>
              <td class="modal-9"><h1>{{number_format($payslip->d_fullday_off)}}</h1></td>
            </tr>
            <tr class="modal-7">
              <td class="modal-8"><h1>Halfday Off</h1></td>
              <td class="modal-9"><h1>{{number_format($payslip->d_halfday_off)}}</h1></td>
            </tr>
            <tr class="modal-7">
              <td class="modal-8"><h1>Late Comming</h1></td>
              <td class="modal-9"><h1>{{number_format($payslip->d_latecoming)}}</h1></td>
            </tr>
            <tr class="modal-7">
              <td class="modal-8"><h1>Loan</h1></td>
              <td class="modal-9"><h1>{{number_format($payslip->d_loan)}}</h1></td>
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
              <td class="modal-9"><h1>{{number_format($payslip->total_deduction)}}</h1></td>
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
          <h1>{{number_format($payslip->net_salary)}}</h1>
        </div>
      </div>
    </div>

    <h4>This is system generated slip. no signature required.</h4>
