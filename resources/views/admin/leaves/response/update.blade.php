<form class="profile-form pad-top-20 pad-bot-20" id="resetPasswordForm" action="{{route('admin.leaves.assign.update')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{base64_encode($user->id)}}">
    <div class="form-row">                                    
        <div class="col-lg-12 col-md-4 col-12 no-margin">
            <div class="row">
                <div class="col-lg-12 col-md-4 col-12 no-margin">
                    <hr class=" no-margin">
                    <div class="card-image">
                        <div class="user-tray">
                            <img src="{{URL::to('public/storage/users/'.$user->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';" alt="Profile">
                            <p>{{$user->firstname.' '.$user->lastname}}</p>
                            <span>{{$user->designation}}</span>
                        </div>
                    </div>
                    <hr>
                </div>
                @foreach($type as $val)
                    <div class="col-lg-12 col-md-4 col-12 no-margin">
                        <div class="input-form res-section-1">
                            <label for="inputCurrentPassword"  class="no-margin pad-bot-10">{{$val->type}}</label>
                            <input type="number" name="leaves_{{$val->id}}" class="form-control" value="{{$assigned[$val->id]}}" required>
                            <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="sav-button pad-top-30 pad-right-20">
                <input type="Submit" value="Update" class="bg-yellow">
            </div>
        </div>
    </div>
</form>