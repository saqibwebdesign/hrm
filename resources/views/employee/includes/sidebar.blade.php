<aside class="left-sidebar section-1-1">
    <div class="scroll-sidebar">    
  <nav class="sidebar-nav section-1-2">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="{{route('employee.dashboard')}}" aria-expanded="false">
                    <span class="hide-menu">Dashboard </span>
                </a>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><span class="hide-menu">Organization</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Announcement</a></li>
                        <li><a href="#">Company Policy</a></li>
                    </ul>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" href="{{route('employee.attendance.monthly')}}" aria-expanded="false">
                        <span class="hide-menu">Attendence</span>
                    </a>
                </li>
                <!-- <li> 
                    <a class="waves-effect waves-dark" href="{{route('employee.leaves')}}" aria-expanded="false">
                        <span class="hide-menu">Leaves</span>
                    </a>
                </li> -->
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><span class="hide-menu">General Settings</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('employee.settings.profile')}}">Basic Information</a></li>
                        <li><a href="{{route('employee.settings.social')}}">Social links</a></li>
                        <li><a href="{{route('employee.settings.bank')}}">Documents</a></li>
                        <li><a href="{{route('employee.settings.qualification')}}">Qualification</a></li>
                        <li><a href="{{route('employee.settings.experience')}}">Work Experience</a></li>
                        <li><a href="{{route('employee.settings.bank')}}">Bank Account</a></li>
                        <li><a href="{{route('employee.settings.changePassword')}}">Change Password</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
