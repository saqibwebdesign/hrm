<form class="profile-form pad-top-20 pad-bot-20" id="resetPasswordForm" action="{{route('admin.holidays.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="holi_id" value="{{base64_encode($data->id)}}">
    <div class="form-row">                                    
        <div class="col-lg-12 col-md-4 col-12 no-margin">
            <div class="row">
                <div class="col-lg-12 col-md-4 col-12 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$data->title}}" required>
                        <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-4 col-12 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Date</label>
                        <input type="date" name="date" class="form-control" value="{{$data->date}}" required>
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