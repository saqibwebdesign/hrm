@extends('employee.includes.layout')
@section('title', 'Leaves')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row"> 
           <div class="col-lg-12 col-md-12 col-12 section-3-1"> 
                <div class="row m-t-10">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="section-3-2">
                            <div class="sec-head2">
                              <h3> Leaves </h3>
                              <ul>
                                 <li> <a href="javascript:void(0)"> Dashboard /  </a>  </li>
                                 <li> leaves </li>
                              </ul>
                             </div>
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
                          <button data-toggle="modal" data-target="#myModal">
                            &nbsp;&nbsp;&nbsp;<i style="font-size:14px;" class="fa fa-plus"></i>&nbsp; Add Leave&nbsp;&nbsp;&nbsp;
                          </button>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card-group">
                          @foreach($types as $val)
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                         <h1 class="">{{$val->available}}</h1>
                                         <h6 class="card-subtitle">{{$val->type}}</h6></div>
                                         <div class="col-12">
                                            <div class="progress">
                                               <div class="progress-bar bg-info" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                          <!-- Column -->
                          <div class="card">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-12">
                                       <h1 class="">24</h1>
                                       <h6 class="card-subtitle">Remaining Leaves</h6></div>
                                       <div class="col-12">
                                          <div class="progress">
                                              <div class="progress-bar bg-warning" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                
                <div class="table-responsive">
                  <table class="table-1">
                     <thead>
                        <tr>
                           <th> # </th>
                           <th> Leave Type </th>
                           <th> From </th>
                           <th> To </th>
                           <th> No. of Days </th>
                           <th> Reason </th>
                           <th> Status </th>
                           <th> Approved By </th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($leaves as $key => $val)
                          <tr>
                             <td> {{++$key}} </td>
                             <td> {{@$val->type->type}} </td>
                             <td> {{date('d-M-Y', strtotime($val->from_date))}} </td>
                             <td> {{date('d-M-Y', strtotime($val->to_date))}} </td>
                             <td> {{$val->days}} Days </td>
                             <td> {{$val->reason}} </td>
                             <td>
                                @switch($val->status)
                                  @case('0')
                                    <label class="badge badge-primary">Pending</label>
                                    @break

                                  @case('1')
                                    <label class="badge badge-success">Approved</label>
                                    @break

                                  @case('2')
                                    <label class="badge badge-danger">Rejected</label>
                                    @break
                                  @endswitch
                             </td>
                             <td> Admin </td>
                          </tr>
                        @endforeach
                        @if(count($leaves) == 0)
                          <tr>
                            <td colspan="8">No Leaves Applied.</td>
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
          <h4 class="modal-title">Add Leaves</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <div class="row">
              <div class="col-lg-12 col-md-6 col-12">
                  <div class="section-3-16">
                       <div class="card">
                        <div class="card-body">      
                            <form method="post" action="{{route('employee.leaves.add')}}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-12 col-md-6 mb-3">
                                      <label for="validationDefault01">Leave Type *</label>
                                      <select class="form-control" name="type_id" required>
                                        <option value="">Select</option>
                                        @foreach($types as $val)
                                          <option value="{{$val->id}}">{{$val->type}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-lg-12 col-md-6 mb-3">
                                     <label for="validationDefault02">From *</label>
                                      <input type="date" class="form-control" name="from_date" required>
                                    </div>
                                    <div class="col-lg-12 col-md-6 mb-3">
                                     <label for="validationDefault02">To *</label>
                                     <input type="date" class="form-control" name="to_date" required>
                                    </div>
                                    <div class="col-lg-12 col-md-6 mb-3">
                                     <label for="validationDefault02">Number of days</label>
                                     <input type="number" class="form-control" name="days" readonly>
                                    </div>
                                    <div class="col-lg-12 col-md-6 mb-3">
                                     <label for="validationDefault02">Remaining Leaves</label>
                                     <input type="number" class="form-control" name="remaining" readonly>
                                    </div>
                                    <div class="col-lg-12 col-md-6 mb-3">
                                     <label for="validationDefault02">Leave Reason</label>
                                     <textarea class="form-control" name="reason" rows="7" required></textarea>
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