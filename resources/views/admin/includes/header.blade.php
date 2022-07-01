<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 p-0">
                <div class="header_iner default_header d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="serach_field-area align-items-center">
                        <h2 class="no-margin col-black">@yield('title')</h2>
                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        
                        <div class="profile_info">
                            <img src="{{URL::to('/public/admin/assets')}}/images/user-placeholder.jpg" alt="#">
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <p>Admin </p>
                                    <h5 class="no-margin">{{Auth::guard('admin')->user()->fullname}}</h5>
                                </div>
                                <div class="profile_info_details">
                                    <a href="{{route('admin.logout')}}">Log Out </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>