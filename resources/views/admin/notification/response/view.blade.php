                                  
        <div class="col-lg-12 col-md-4 col-12 no-margin">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-12 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Department</label>
                        <h4>{{empty($data->department_id) ? 'All Departments' : $data->depart->name}}</h4>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Title</label>
                        <h4>{{$data->title}}</h4>
                    </div>
                </div>
                <div class="col-lg-12 col-md-4 col-12 no-margin">
                    <div class="input-form res-section-1">
                        <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Description</label>
                        <div>{!! $data->description !!}</div>
                    </div>
                </div>
            </div>
        </div>