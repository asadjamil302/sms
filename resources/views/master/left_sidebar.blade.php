<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="{{route('home')}}">
                        <i class="si si-fire text-primary"></i>
                        <span class="font-size-xl text-dual-primary-dark">S-M-S_</span><span class="font-size-xl text-primary">System</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32"  src="{{url('/assets/media/photos/5.jpeg')}}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="{{url('/assets/media/photos/5.jpeg')}}">
                    <img class="img-avatar" src="{{url('/assets/media/photos/5.jpeg')}}" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" href="{{url('home')}}">S-M-S</a>
                    </li>
                    <li class="list-inline-item">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                            <i class="si si-drop"></i>
                        </a>
                    </li>
                    
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('') }}

                            <i class="si si-logout mr-5"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a class="active" href="{{route('home')}}"><i class="fa fa-dashboard"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>
                
                       
                </li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">User Interface</span></li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="{{route('student.index')}}"><i class="fa fa-graduation-cap"></i><span class="sidebar-mini-hide">Student</span></a>
                    <ul>
                        <li>
                            <a href="{{route('student.index')}}">Students</a>
                        </li>
                        <li>
                            <a href="{{route('student.create')}}">Create Student</a>
                        </li>
                    
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="{{route('subject.index')}}"><i class="fa fa-book"></i><span class="sidebar-mini-hide">Subject</span></a>
                    <ul>
                        <li>
                            <a href="{{route('subject.index')}}">Subjects</a>
                        </li>
                        <li>
                            <a href="{{route('subject.create')}}">Create Subject</a>
                        </li>
                    
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="{{route('attendance.index')}}"><i class="fa fa-list-alt"></i><span class="sidebar-mini-hide">Attendance</span></a>
                    <ul>
                        <li>
                            <a href="{{route('attendance.index')}}">Attendance</a>
                        </li>
                        
                        {{-- <li>
                            <a href="{{route('attendance/{attendance}.show')}}">Show Attendance</a>
                        </li> --}}
                    </ul>
                </li>
                @role('super_admin')

                <li>
                    <a class="nav-subme nu" data-toggle="nav-submenu" href="#"><i class="fa fa-user"></i><span class="sidebar-mini-hide">Roles</span></a>
                    <ul>
                        <li>
                            <a href="{{route('roles.index')}}">Roles</a>
                        </li>
                        <li>
                            <a href="{{route('roles.create')}}">Create role</a>
                        </li>
                    </ul>
                </li>
                @endrole
      


                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="{{route('user.index')}}"><i class="si si-user"></i><span class="sidebar-mini-hide">User</span></a>
                    <ul>
                        <li>
                            <a href="{{route('user.index')}}">Users</a>
                        </li>
                        <li>
                            <a href="{{route('user.create')}}">Create Users</a>
                        </li>
                    
                    </ul>
                </li>

                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="{{route('teacher.index')}}"><i class="fa fa-users"></i><span class="sidebar-mini-hide">Teacher</span></a>
                    <ul>
                        <li>
                            <a href="{{route('teacher.index')}}">Teacher</a>
                        </li>
                        <li>
                            <a href="{{route('teacher.create')}}">Create Teacher</a>
                
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="{{route('clazz.index')}}"><i class="fa fa-address-book"></i><span class="sidebar-mini-hide">Class</span></a>
                    <ul>
                        <li>
                            <a href="{{route('clazz.index')}}">class</a>
                        </li>
                        <li>
                            <a href="{{route('clazz.create')}}">Create class</a>
                        </li>
                    
                    </ul>
                </li>
                    

           
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>