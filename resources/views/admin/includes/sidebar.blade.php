 <!-- sidebar part here -->
<nav class="sidebar vertical-scroll ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="{{URL::to('/admin')}}">
          <img src="{{URL::to('/public/admin/assets')}}/images/logo-black.png" width="100%" alt="">
        </a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li>
            <a href="{{route('admin.dashboard')}}"  aria-expanded="false">
              Dashboard
            </a>
        </li>
        <li>
            <a href="{{route('admin.employee')}}"  aria-expanded="false">
              Employees
            </a>
        </li>
        <li>
            <a class="has-arrow"  href="javascript:void(0)"  aria-expanded="false">
              <span>Attendance</span>
            </a>
            <ul>
              <li><a href="{{route('admin.attendance.today')}}">Today Attendance</a></li>
              <li><a href="{{route('admin.attendance.sheet')}}">Attendance Sheet</a></li>
              <li><a href="{{route('admin.attendance.shift')}}">Manage Shifts</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.leaves')}}"  aria-expanded="false">
              Leaves
            </a>
        </li>
        <li>
            <a href="{{route('admin.payroll')}}"  aria-expanded="false">
              Payroll
            </a>
        </li>
        <li>
            <a href="{{route('admin.notification')}}"  aria-expanded="false">
              Notifications
            </a>
        </li>
        <li>
            <a href="{{route('admin.holidays')}}"  aria-expanded="false">
              Holidays
            </a>
        </li>
        <li>
            <a class="has-arrow"  href="javascript:void(0)"  aria-expanded="false">
              <span>General Settings</span>
            </a>
            <ul>
              <li><a href="{{route('admin.settings.department')}}">Departments</a></li>
            </ul>
        </li>
    </ul>
</nav>
<!-- sidebar part end -->


