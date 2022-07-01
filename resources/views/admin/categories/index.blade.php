@extends('admin.includes.master')
@section('title', 'Catagories')

@section('content')
<style type="text/css">
.img-thumbnail {
    height: auto;
}
.sec-46 h5 {
    font-size: 22px;
}
@media screen and (max-width:519px) and (min-width:320px) { 
.browseProfilePhoto {
    margin-top: 10px;
    margin-left: 8px;
}
}
@media screen and (max-width:992px) and (min-width:768px) { 
.browseProfilePhoto {
    margin-top: 80px;
}
}

</style>
<div class="main_content_iner">
    <div class="container-fluid">
      	<div class="order-section-chart ">
          	<div class="row">
	            <div class="col-lg-12 col-md-12 col-12 sec-45">
	                <div class="white_box">
	                   <div class="QA_section">
                            <div class="white_box_tittle list_header no-margin">
                                <h3 class="inner-order-head no-margin pad-bot-10">Catagories</h3>
                                <div class="add_button m-b-20 pad-top-10">
                                    <a href="#" class="bg-yellow" data-toggle="modal" data-target="#add-catagories">Add New</a>
                                </div>
                            </div>
                            <hr>
                            <div class="QA_table restaurant-section">
                                <table class="table table-striped lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" style="width:20%">Image</th>
                                            <th scope="col" style="width:65%">Name</th>
                                            <th scope="col" style="width:15%; text-align: right;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $key => $val)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    <img src="{{URL::to('/public/storage/category/'.$val->image)}}" width="100px"> 
                                                </td>
                                                <td><h4>{{$val->name}}</h4></td>
                                                <td></td>
                                                <td style=" text-align: right;">
                                                    <div class="action-tray">
                                                    	<a href="javascript:void(0)" class="btn btn-sm btn-primary editCategory" data-id="{{base64_encode($val->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                                                    	<a href="javascript:void(0)" class="btn btn-sm btn-danger deleteCategory" data-id="{{base64_encode($val->id)}}"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>                               
                                        @endforeach             
                                    </tbody>
                                </table>
                            </div>
                        </div>                    		
	                </div>
	            </div>
            </div>
            {{$categories->links()}}
        </div>
    </div>
</div>

<!-- General add popup -->

    <div class="modal fade" id="add-catagories" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 30%;" role="document">
            <div class="modal-content">
                <div class="modal-header sec-46">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Catagories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <form class="profile-form pad-top-20 pad-bot-20" id="resetPasswordForm" action="{{route('admin.catagories.add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">                                    
                            <div class="col-lg-12 col-md-4 col-12 no-margin">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5 col-5">
                                        <img src="{{URL::to('/public/admin/assets')}}/images/placeholder.png" class="previewProfilePhoto previewProfilePhotoCat img-thumbnail">
                                    </div>
                                    <div class="col-lg-8 col-md-9 col-7">
                                        <div id="msg"></div>
                                        <input type="file" name="logo_img" class="profilePic profilePicCat" accept="image/*" required>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <button type="button" class="browseProfilePhoto browseProfilePhotoCat btn btn-primary">Change photo</button>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-lg-12 col-md-4 col-12 no-margin">
                                        <div class="input-form res-section-1">
                                            <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                            <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sav-button pad-top-30 pad-right-20">
                                    <input type="Submit" value="Submit" class="bg-yellow">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>                 
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-catagories" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 30%;" role="document">
            <div class="modal-content">
                <div class="modal-header sec-46">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Catagories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                </div>                 
            </div>
        </div>
    </div>
@endsection