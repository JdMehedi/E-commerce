<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Sheikh Rasel Hall Management System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{asset('phq/assets/global/css/google-fonts.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('phq/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('phq/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('phq/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('phq/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{asset('phq/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('phq/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('phq/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('phq/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('phq/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('phq/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />


        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{asset('phq/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('phq/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->


        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('phq/assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('phq/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('phq/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('phq/assets/layouts/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{asset('phq/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('phq/assets/css/custom_new.css')}}" rel="stylesheet" type="text/css" />    

        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />

        @yield('custom_css')

        <style type="text/css">
            .red{
                color:red;
            }
            .page-logo img{
                width: 50px !important;
                margin-top: 0px !important;
            }
            .mt-checkbox-inline, .mt-radio-inline {
                    padding: 0px 0;
                }
        </style>

        <script type="text/javascript">
            var base_url = "{{ URL::to('') }}";
            var csrf_token = "{{ csrf_token() }}";
        </script>
        <?php 
            //use App\Models\Company;
            //$company_id = Auth::user()->company_id;
            //$company_info = Company::find($company_id);
           // $compnay_logo = asset('assets/layouts/layout/img/logo.jpg');
           // if($company_info){
            //    $compnay_logo = URL::to('/').'/uploads/logo/'.$company_info->logo;
           // }
        ?>
    </head>
    <!-- END HEAD -->

    <body style="background-color: #3e6562;"  class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div style="background-color: #3e6562;"  class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div style="background-color: #3e6562;" class="page-header-inner ">
                <!-- BEGIN LOGO -->

                <div style="background-color: #3e6562;" class="page-logo">
                    <a href="{{ URL::to('adminUser') }}">
                        <img src="{{ URL::to('/') }}/sharing/images/srh2.png" alt="logo" class="logo-default" width="80"/> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>                      
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div  class="top-menu" >
                    <ul  class="nav navbar-nav pull-right">
                        <li  class="dropdown dropdown-user"  >
                            <a href="javascript:;" style="background-color: #3e6562;" class="dropdown-toggle"  data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username username-hide-on-mobile"> {{ isset(Auth::user()->fname)?Auth::user()->fname:'No User Logged On' }} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul  class="dropdown-menu dropdown-menu-default">
                                @if(\Illuminate\Support\Facades\Auth::user())
                                <li>
                                    <a href="{{ URL::to('profileDisplay') }}"><i class="icon-user"></i> Profile </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('passwordChange') }}"><i class="icon-cursor"></i> Change Password </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('logout') }}"><i class="icon-key"></i> Log Out </a>
                                </li>
                                @else
                                <li>
                                    <a href="{{ URL::to('login') }}"><i class="icon-user"></i> Login </a>
                                </li>

                                @endif

                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div  class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div style="background-color: #3e6562;" class="page-container" >
            <!-- BEGIN SIDEBAR -->
            <div style="background-color: #3e6562;" class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div style="background-color: #3e6562;" class="page-sidebar navbar-collapse collapse" >
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul style="background-color: #3e6562;" class="page-sidebar-menu  page-header-fixed "  data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li style="background-color: #3e6562;" class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <li  class="nav-item {{ Request::path() == 'adminUser' ? 'active' : '' }}">
                            <a href="{{ URL::to('/adminUser') }}" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span  class="selected"></span>
                            </a>
                        </li>
                        <?php

                        $members = array('users', 'users/add');
                        $user=Auth::user();
                        ?>
                        @if (!is_null(Auth::user()) &&  (Auth::user()->can('adduser') || Auth::user()->can('userlist')))

                        <li class="nav-item {{ in_array(Request::path(), $members) ? 'active' : '' }}">
                            <a  href="javascript:;" class="nav-link nav-toggle">
                                <i  class="fa fa-user"></i>
                                <span  class="title">User</span>
                                <span  class="arrow {{ in_array(Request::path(), $members) ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                @if($user->can('adduser'))
                                <li class="nav-item {{ Request::path() == 'users/add' ? 'active' : '' }}">
                                    <a  href="{{ URL::to('users/add') }}" class="nav-link ">
                                        <span class="title">Add User</span>
                                    </a>
                                </li>
                                @endif
                                @if($user->can('userlist'))
                                <li class="nav-item {{ Request::path() == 'users' ? 'active' : '' }}">
                                    <a  href="{{ URL::to('users') }}" class="nav-link ">
                                        <span class="title">UserList</span>
                                    </a>
                                </li>
                                    @endif
                            </ul>
                        </li>
                        @endif

                        <?php


                        $members = array('notices', 'notices/add');
                        ?>
                        <li class="nav-item {{ in_array(Request::path(), $members) ? 'active' : '' }}">
                            <a  href="javascript:;" class="nav-link nav-toggle">
                                <i  class="fa fa-user"></i>
                                <span  class="title">Notice</span>
                                <span  class="arrow {{ in_array(Request::path(), $members) ? 'open' : '' }}"></span>
                            </a>
                            <ul  class="sub-menu">
                                <li  class="nav-item {{ Request::path() == 'notices/add' ? 'active' : '' }}">
                                    <a   href="{{ URL::to('notices/add') }}" class="nav-link ">
                                        <span  class="title">Add Notice</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ Request::path() == 'notices' ? 'active' : '' }}">
                                    <a  href="{{ URL::to('notices') }}" class="nav-link ">
                                        <span class="title">Notice List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php
                        $user=Auth::user();
                        $members = array('shippers', 'consignees');
                        ?>
                        @if (!is_null(Auth::user()) &&  (Auth::user()->can('shipper.index') || Auth::user()->can('consignee.index')))
                        <li class="nav-item {{ in_array(Request::path(), $members) ? 'active' : '' }}">
                            <a  href="javascript:;" class="nav-link nav-toggle">
                                <i  class="fa fa-user"></i>
                                <span  class="title">Trucker</span>
                                <span  class="arrow {{ in_array(Request::path(), $members) ? 'open' : '' }}"></span>
                            </a>
                            <ul  class="sub-menu">
                                @if($user->can('shipper.index'))
                                    <li class="nav-item {{ Request::path() == 'shipper' ? 'active' : '' }}">
                                        <a  href="{{ URL::to('shippers') }}" class="nav-link ">
                                            <span class="title">Shipper List</span>
                                        </a>
                                    </li>

                                @endif
                                    @if($user->can('consignee.index'))

                                    <li class="nav-item {{ Request::path() == 'consignees' ? 'active' : '' }}">
                                    <a  href="{{ URL::to('consignees') }}" class="nav-link ">
                                        <span class="title">Consignee List</span>
                                    </a>
                                </li>
                                    @endif
                            </ul>
                        </li>
                        @endif

                    <?php
                        $members = array('roles', 'roles/create');
                        $user=Auth::user();
                        ?>

                        @if (!is_null(Auth::user()) &&  (Auth::user()->can('roles.index') || Auth::user()->can('roles.create')))
                        <li class="nav-item {{ in_array(Request::path(), $members) ? 'active' : '' }}">
                            <a  href="javascript:;" class="nav-link nav-toggle">
                                <i  class="fa fa-user"></i>
                                <span  class="title">Roles</span>
                                <span  class="arrow {{ in_array(Request::path(), $members) ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                            @if($user->can('roles.index'))

                                <li class="nav-item {{ Request::path() == 'roles' ? 'active' : '' }} ">
                                    <a  href="{{ URL::to('roles') }}" class="nav-link ">
                                        <span class="title">Role List</span>
                                    </a>
                                </li>
                                @endif

                     @if($user->can('roles.create'))
                                <li class="nav-item {{ Request::path() == 'roles/create' ? 'active' : '' }}">
                                    <a  href="{{ URL::to('roles/create') }}" class="nav-link ">
                                        <span class="title">New Role</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    

                    @if (Session::has('timeout_message'))
                      <div class="alert alert-info timeout_message m-t-sm">{{ Session::get('timeout_message') }}</div>
                    @endif
                    @if (Session::has('message'))
                      <div class="alert alert-info m-t-sm">{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error_message'))
                      <div class="alert alert-danger m-t-sm"><?php echo html_entity_decode(Session::get('error_message')); ?></div>
                    @endif
                    @if (Session::has('warning_message'))
                      <div class="alert alert-warning m-t-sm">{{ Session::get('warning_message') }}</div>
                    @endif
                    @if (Session::has('success_message'))
                      <div class="alert alert-success m-t-sm">{{ Session::get('success_message') }}</div>
                    @endif

                    <div class="alert m-t-sm hide ajax_msg"></div>

                    @yield('content')


                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->

        <!--================ Start footer Area  =================-->
        <footer class="footer-area section-gap">
            <div class="footer_top section_gap">
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <p class="footer-text" style="color:white "><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.dribbble.com" target="_blank"><i class="fa fa-dribbble"></i></a>
                            <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--================ End footer Area  =================-->




        <!-- END FOOTER -->
        <script src="{{asset('phq/assets/global/plugins/respond.min.js')}}"></script>
        <script src="{{asset('phq/assets/global/plugins/excanvas.min.js')}}"></script>

        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('phq/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{asset('phq/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('phq/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('phq/assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/amcharts/amcharts/themes/patterns.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/amcharts/amcharts/themes/chalk.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/amcharts/amstockcharts/amstock.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('phq/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{asset('phq/assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('phq/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        
        <script src="{{asset('phq/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/js/custom_common.js')}}" type="text/javascript"></script>
        <script src="{{asset('phq/assets/js/modal.js')}}" type="text/javascript"></script>
        
        <script src="{{asset('phq/assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->



        <!--  footer manu-->
        <!-- Bootstrap CSS -->
             <!-- main css -->
        <link rel="stylesheet" href="{{asset('/sharing/footer/css/style.css')}}">
        <!--end footer -->
        @yield('custom_js')
    </body>

</html>