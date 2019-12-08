<!--sidebar start-->
<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="{{route('/')}}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Courses</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('manageCourse')}}">Manage Course</a></li>
              <li><a class="" href="form_validation.html">Form Validation</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_desktop"></i>
              <span>Student</span>
              <span class="menu-arrow arrow_carrot_right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="{{route('getStudentRegister')}}">Create Student</a></li>
              <li><a class="" href="{{route('studentInfo')}}">Student List</a></li>
              <li><a class="" href="grids.html">Grids</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Fees</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('getPayment')}}">Student payment</a></li>
              <li><a class="" href="{{route('getFeeReport')}}">Fee Report</a></li>
            </ul>

          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Report</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('getStudentList')}}">Student List</a></li>
              <li><a class="" href="{{route('getStudentListMultiClass')}}">Multi Class Student List</a></li>
              <li><a class="" href="{{route('getNewstudentRegister')}}">New Student Enroll</a></li>
            </ul>
          </li>


        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
