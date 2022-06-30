<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header section-1">
            <a class="navbar-brand" href="{{route('employee.dashboard')}}">
                    <img src="{{URL::to('/public/employee')}}/assets/image/image2.jpg" alt="homepage" class="dark-logo" />
                    <img src="{{URL::to('/public/employee')}}/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                </b>
               <span>
                 <img src="{{URL::to('/public/employee')}}/assets/image/image1.png" alt="homepage" class="dark-logo" width="65%" />  
                 <img src="{{URL::to('/public/employee')}}/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
               </span> 
            </a>
        </div>
        <div class="navbar section-1-5">   
            <ul class="navbar-nav">  
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <!-- <div class="section-1-3">
                    <div class="serach_field-area d-flex align-items-center">
                          <div class="search_inner">
                            <form action="#">
                                <div class="search_field">
                                  <input type="text" placeholder="Search">
                                </div>
                                <button type="submit"> <img src="{{URL::to('/public/employee')}}/assets/image/image3.png" alt="user" class="img-circle"> </button>
                            </form>
                          </div>
                    </div>
                </div>

                <li class="nav-item dropdown section-1-4">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                        <ul>
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="user-img"> <img src="{{URL::to('/public/employee')}}/assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online"></span> </div>
                                        <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="{{URL::to('/public/employee')}}/assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy"></span> </div>
                                        <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="{{URL::to('/public/employee')}}/assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away"></span> </div>
                                        <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="{{URL::to('/public/employee')}}/assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline"></span> </div>
                                        <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown section-1-4">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu mailbox animated slideInUp">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                        <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                        <div class="mail-contnet">
                                        <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                        <div class="mail-contnet">
                                        <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                        <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                 </li>   
 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{URL::to('public/storage/users/'.Auth::user()->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{URL::to('public/storage/users/'.Auth::user()->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';"/></div>
                                    <div class="u-text">
                                        <h4>{{substr(Auth::user()->firstname,0, 1).'. '.Auth::user()->lastname}}</h4>
                                        <p class="text-muted">{{Auth::user()->email}}</p><a href="{{route('employee.settings.profile')}}" class="btn btn-rounded btn-danger btn-sm">Edit Profile</a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>