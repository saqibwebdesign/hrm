<form class="profile-form pad-top-20 pad-bot-20" id="resetPasswordForm" action="{{route('admin.attendance.shift.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="shift_id" value="{{base64_encode($data->id)}}">
    <div class="form-row">                                    
        <div class="col-lg-12 col-md-4 col-12 no-margin">
            <div class="row">
                <div class="col-12 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$data->title}}" required>
                        <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Check-In</label>
                        <input type="time" name="check_in" class="form-control" value="{{$data->check_in}}" required>
                        <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                    </div>
                </div>
                <div class="col-6 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Check-Out</label>
                        <input type="time" name="check_out" class="form-control" value="{{$data->check_out}}" required>
                        <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Grace Time <small>(min)</small></label>
                        <input type="number" name="grace_time" value="{{$data->grace_time}}" class="form-control" required>
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