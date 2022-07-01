
<form class="profile-form pad-top-20 pad-bot-20" id="resetPasswordForm" action="{{route('admin.catagories.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="cid" value="{{base64_encode($data->id)}}">
    <div class="form-row">                                    
        <div class="col-lg-12 col-md-4 col-12 no-margin">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-5">
                    <img src="{{URL::to('/public/storage/category/'.$data->image)}}" class="previewProfilePhoto previewProfilePhotoCatE img-thumbnail">
                </div>
                <div class="col-lg-8 col-md-9 col-7">
                    <div id="msg"></div>
                    <input type="file" name="logo_img" class="profilePic profilePicCatE" accept="image/*">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button type="button" class="browseProfilePhoto browseProfilePhotoCatE btn btn-primary">Change photo</button>
                        </div>
                    </div>                                            
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-4 col-12 no-margin">
            <div class="input-form res-section-1">
                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Name</label>
                <input type="text" name="name" value="{{$data->name}}" class="form-control" required>
                <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
            </div>
        </div>
    </div>
    <div class="sav-button pad-top-30 pad-right-20">
        <input type="Submit" value="Submit" class="bg-yellow">
    </div>
</form>