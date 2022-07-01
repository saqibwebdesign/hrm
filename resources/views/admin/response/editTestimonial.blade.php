
<form class="profile-form pad-top-20 pad-bot-20" id="resetPasswordForm" action="{{route('admin.testimonial.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="cid" value="{{base64_encode($data->id)}}">
    <div class="form-row">                                    
        <div class="col-lg-12 col-md-4 col-12 no-margin">
            <div class="row">
                <div class="col-lg-12 col-md-4 col-12 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Category</label>
                        <select name="category" class="form-control" required>
                            <option value="">Select</option>
                            @foreach($categories as $val)
                                <option value="{{$val->id}}"
                                    {{$data->category_id == $val->id ? 'selected' : ''}}
                                >{{$val->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-4 col-12 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Client Name</label>
                        <input type="text" name="client_name" value="{{$data->client_name}}" class="form-control" required>
                        <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-4 col-12 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Client Tagline</label>
                        <input type="text" name="client_tagline" value="{{$data->client_tagline}}" class="form-control" required>
                        <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-4 col-12 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Testimonial</label>
                        <textarea class="form-control" name="testimonial" rows="7" required>{{$data->testimonial}}</textarea>
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