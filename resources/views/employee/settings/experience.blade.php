@extends('employee.includes.layout')
@section('title', 'Work Experience')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row"> 
           <div class="col-lg-12 col-md-8 col-12 section-3-1"> 
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="section-3-2">
                            <h2>Work Experience</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="row">
                            <div class="col-lg-7 col-md-6 col-12 no-pad">
                                <div class="section-3-3">
                                   <div class="search">
                                        <form action="/action_page.php">
                                          <input type="text" placeholder="Search.." name="search">
                                          <button type="submit"> <img src="{{URL::to('/public/employee')}}/assets/image/image3.png" alt="user" class="img-circle"></button>
                                        </form>
                                   </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-12">
                                <div class="section-3-4">
                                  <button data-toggle="modal" data-target="#myModal"><i style="font-size:14px;" class="fa fa-plus"></i>&nbsp; Add Experience</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



             <div class="table-responsive section-3-5">
                <table class="table">
                  <thead class="thead-dark section-3-6">
                      <tr>
                        <th scope="col">Company</th>
                        <th scope="col">From Date</th>
                        <th scope="col">To Date</th>
                        <th scope="col">Post </th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($experience as $val)
                        <tr class="section-3-7">
                           <td>{{$val->company_name}}</td>
                           <td>{{date('d-M-Y', strtotime($val->from_date))}}</td>
                           <td>{{date('d-M-Y', strtotime($val->to_date))}}</td>
                           <td>{{$val->position}}</td>
                           <td><p class="ellipsis" title="{{$val->description}}">{{$val->description}}</p></td>
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
                      @if(count($experience) == 0)
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
          <h4 class="modal-title">Add Experience</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <div class="row">
              <div class="col-lg-12 col-md-6 col-12">
                  <div class="section-3-16">
                       <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{route('employee.settings.experience.add')}}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-12 col-md-12 mb-3">
                                      <label for="validationDefault01">Company</label>
                                      <input type="text" class="form-control" name="company_name" required>
                                    </div>
                                </div>
                              
                                <div class="form-row">
                                    <div class="col-lg-6 col-md-6 mb-3">
                                     <label for="validationDefault02">From Date</label>
                                      <input class="form-control" type="date" name="from_date" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-3">
                                      <label for="validationDefault02">To Date</label>
                                      <input class="form-control" type="date" name="to_date" required>
                                    </div>
                                </div>
                              
                                <div class="form-row">
                                    <div class="col-lg-12 col-md-12 mb-3">   
                                      <label for="validationDefault02">Position</label>
                                      <input type="text" class="form-control" name="position" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-12 col-md-6 mb-3">
                                      <label for="validationDefault02">Description</label>
                                      <textarea class="form-control" name="description" rows="6" required></textarea>
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
      </div>
    </div>
  </div>
@endsection
@section('addScript')
<script type="text/javascript">
</script>
@endsection