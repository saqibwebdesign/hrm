@extends('employee.includes.layout')
@section('title', 'Bank Accounts')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row"> 
           <div class="col-lg-12 col-md-12 col-12 section-3-1"> 
                <div class="row m-t-10">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="section-3-2">
                            <h2 class="page-title-text2">Bank Account</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                      <div class="form-holder1">
                        <div class="section-3-3">
                                   <div class="search">
                                        <form action="/action_page.php">
                                          <input type="text" placeholder="Search.." name="search">
                                          <button type="submit"> <img src="{{URL::to('/public/employee')}}/assets/image/image3.png" alt="user" class="img-circle"></button>
                                        </form>
                                   </div>
                                </div>
                                <div class="section-3-4">
                                  <button data-toggle="modal" data-target="#myModal"><i style="font-size:14px;" class="fa fa-plus"></i>&nbsp; Add Bank Account</button>
                                </div>
                              </div>
                    </div>
                </div>



             <div class="table-responsive section-3-5 m-t-40">
                <table class="table">
                  <thead class="thead-dark section-3-6">
                      <tr>
                        <th scope="col">Account Title</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Bank Code </th>
                        <th scope="col">Bank Branch</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($accounts as $val)
                        <tr class="section-3-7">
                           <td>{{$val->account_title}}</td>
                           <td>{{$val->account_no}}</td>
                           <td>{{@$val->bank->name}}</td>
                           <td>{{$val->branch_code}}</td>
                           <td>{{$val->branch_name}}</td>
                           <td>
                              <a href="">
                                <i class="fa fa-pencil section-3-9" aria-hidden="true"></i>
                              </a>&nbsp; 
                              <a href="#">
                                <i class="fa fa-trash section-3-10"></i>
                              </a>
                            </td>
                        </tr>
                      @endforeach
                      @if(count($accounts) == 0)
                        <tr>
                          <td colspan="6">No data found.</td>
                        </tr>
                      @endif
                  </tbody>
              </table>
            </div>
           </div>  
        </div>   
    </div>
</div>

<!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Bank Account</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <div class="row">
              <div class="col-lg-12 col-md-6 col-12">
                  <div class="section-3-16">
                       <div class="card">
                        <div class="card-body">      
                            <form method="post" action="{{route('employee.settings.bank.add')}}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-12 col-md-6 mb-3">
                                      <label for="validationDefault01">Bank Name *</label>
                                      <select class="form-control" name="bank_id" required>
                                        <option value="">Select</option>
                                        @foreach($banks as $val)
                                          <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-lg-12 col-md-6 mb-3">
                                     <label for="validationDefault02">Account Title *</label>
                                      <input type="text" class="form-control" name="account_title" required>
                                    </div>
                                    <div class="col-lg-12 col-md-6 mb-3">
                                     <label for="validationDefault02">Account Number *</label>
                                     <input type="number" class="form-control" name="account_no" required>
                                    </div>
                                    <div class="col-lg-12 col-md-6 mb-3">
                                     <label for="validationDefault02">Branch Name</label>
                                     <input type="text" class="form-control" name="branch_name">
                                    </div>
                                    <div class="col-lg-12 col-md-6 mb-3">
                                     <label for="validationDefault02">Branch Code</label>
                                     <input type="number" class="form-control" name="branch_code">
                                    </div>
                                    <div class="col-lg-12 col-md-6 mb-3 text-right">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary">&nbsp;&nbsp;Add&nbsp;&nbsp;</button>
                                    </div>
                                  </div>   
                            </form>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('addScript')
<script type="text/javascript">
</script>
@endsection