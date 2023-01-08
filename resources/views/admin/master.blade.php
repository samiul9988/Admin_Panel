<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Dec 2022 15:56:43 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">


    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/fontawesome-free/css/all.min.css">


    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/jqvmap/jqvmap.min.css">
{{--    Summernote--}}
    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/summernote/summernote-bs4.min.css">

    {{--    Data Table--}}
    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    {{--    switch button--}}
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/')}}admin/dist/css/adminlte.min2167.css?v=3.2.0">

    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/daterangepicker/daterangepicker.css">

    {{--Notification--}}
    <link rel="stylesheet" href="{{asset('/')}}admin/toastifyNotification/toastify.min.css">
    {{------}}

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/summernote/summernote-bs4.min.css">
    <script nonce="49295efc-1990-40af-9ed8-0d65b65b8644">(function(w,d){!function(eK,eL,eM,eN){eK.zarazData=eK.zarazData||{};eK.zarazData.executed=[];eK.zaraz={deferred:[],listeners:[]};eK.zaraz.q=[];eK.zaraz._f=function(eO){return function(){var eP=Array.prototype.slice.call(arguments);eK.zaraz.q.push({m:eO,a:eP})}};for(const eQ of["track","set","debug"])eK.zaraz[eQ]=eK.zaraz._f(eQ);eK.zaraz.init=()=>{var eR=eL.getElementsByTagName(eN)[0],eS=eL.createElement(eN),eT=eL.getElementsByTagName("title")[0];eT&&(eK.zarazData.t=eL.getElementsByTagName("title")[0].text);eK.zarazData.x=Math.random();eK.zarazData.w=eK.screen.width;eK.zarazData.h=eK.screen.height;eK.zarazData.j=eK.innerHeight;eK.zarazData.e=eK.innerWidth;eK.zarazData.l=eK.location.href;eK.zarazData.r=eL.referrer;eK.zarazData.k=eK.screen.colorDepth;eK.zarazData.n=eL.characterSet;eK.zarazData.o=(new Date).getTimezoneOffset();if(eK.dataLayer)for(const eX of Object.entries(Object.entries(dataLayer).reduce(((eY,eZ)=>({...eY[1],...eZ[1]})))))zaraz.set(eX[0],eX[1],{scope:"page"});eK.zarazData.q=[];for(;eK.zaraz.q.length;){const e_=eK.zaraz.q.shift();eK.zarazData.q.push(e_)}eS.defer=!0;for(const fa of[localStorage,sessionStorage])Object.keys(fa||{}).filter((fc=>fc.startsWith("_zaraz_"))).forEach((fb=>{try{eK.zarazData["z_"+fb.slice(7)]=JSON.parse(fa.getItem(fb))}catch{eK.zarazData["z_"+fb.slice(7)]=fa.getItem(fb)}}));eS.referrerPolicy="origin";eS.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(eK.zarazData)));eR.parentNode.insertBefore(eS,eR)};["complete","interactive"].includes(eL.readyState)?zaraz.init():eK.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>




<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

{{--    <div class="preloader flex-column justify-content-center align-items-center">--}}
{{--        <img class="animation__shake" src="{{asset('/')}}admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">--}}
{{--    </div>--}}

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="index3.html" class="nav-link">Home</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="#" class="nav-link">Contact</a>--}}
{{--            </li>--}}
        </ul>

        <ul class="navbar-nav ml-auto">

{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" data-widget="navbar-search" href="#" role="button">--}}
{{--                    <i class="fas fa-search"></i>--}}
{{--                </a>--}}
{{--                <div class="navbar-search-block">--}}
{{--                    <form class="form-inline">--}}
{{--                        <div class="input-group input-group-sm">--}}
{{--                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <button class="btn btn-navbar" type="submit">--}}
{{--                                    <i class="fas fa-search"></i>--}}
{{--                                </button>--}}
{{--                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                    <i class="far fa-comments"></i>--}}
{{--                    <span class="badge badge-danger navbar-badge">3</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                    <a href="#" class="dropdown-item">--}}

{{--                        <div class="media">--}}
{{--                            <img src="{{asset('/')}}admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
{{--                            <div class="media-body">--}}
{{--                                <h3 class="dropdown-item-title">--}}
{{--                                    Brad Diesel--}}
{{--                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
{{--                                </h3>--}}
{{--                                <p class="text-sm">Call me whenever you can...</p>--}}
{{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}

{{--                        <div class="media">--}}
{{--                            <img src="{{asset('/')}}admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                            <div class="media-body">--}}
{{--                                <h3 class="dropdown-item-title">--}}
{{--                                    John Pierce--}}
{{--                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
{{--                                </h3>--}}
{{--                                <p class="text-sm">I got your message bro</p>--}}
{{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}

{{--                        <div class="media">--}}
{{--                            <img src="{{asset('/')}}admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                            <div class="media-body">--}}
{{--                                <h3 class="dropdown-item-title">--}}
{{--                                    Nora Silvester--}}
{{--                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
{{--                                </h3>--}}
{{--                                <p class="text-sm">The subject goes here</p>--}}
{{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                    <i class="far fa-bell"></i>--}}
{{--                    <span class="badge badge-warning navbar-badge">15</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                    <span class="dropdown-item dropdown-header">15 Notifications</span>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
{{--                        <span class="float-right text-muted text-sm">3 mins</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-users mr-2"></i> 8 friend requests--}}
{{--                        <span class="float-right text-muted text-sm">12 hours</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-file mr-2"></i> 3 new reports--}}
{{--                        <span class="float-right text-muted text-sm">2 days</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" data-widget="fullscreen" href="#" role="button">--}}
{{--                    <i class="fas fa-expand-arrows-alt"></i>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">--}}
{{--                    <i class="fas fa-th-large"></i>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="nav-item dropdown">
                @php
                    $name=explode(' ',\Illuminate\Support\Facades\Auth::user()->name);
                    $user=\Illuminate\Support\Facades\Auth::user();
                @endphp
                <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" role="button">
                    <i class="fas fa-user-alt mr-1"></i> {{$name[0]}}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    @foreach($user->roles as $role)
                        @if($role->role_name == 'admin')
                            <a class="dropdown-item" href="{{route('admin.home')}}"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Admin Home</a>
                        @elseif($role->role_name == 'blog_admin')
                            <a class="dropdown-item" href="{{route('blog.home')}}"><i class="bx bx-user font-size-16 align-middle mr-1"></i>Blog Admin Home</a>
                        @endif
                    @endforeach
                    <a class="dropdown-item" href="{{route('dashboard')}}"><i class="bx bx-user font-size-16 align-middle mr-1"></i> user Home</a>

                    <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout
                    </a>
                    <form action="{{route('logout')}}" method="POST" id="logoutForm">
                        @csrf
                    </form>
                </div>

            </li>
        </ul>
{{--        <div class="dropdown d-inline-block">--}}
{{--            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"--}}
{{--                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                @php--}}
{{--                $name=explode(' ',\Illuminate\Support\Facades\Auth::user()->name);--}}
{{--                $user=\Illuminate\Support\Facades\Auth::user();--}}
{{--                @endphp--}}
{{--                <span class="d-none d-xl-inline-block ml-1 font-weight-bold" style="font-size: 18px;">{{$name[0]}}</span>--}}
{{--                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>--}}
{{--            </button>--}}
{{--            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                <!-- item-->--}}
{{--                @foreach($user->roles as $role)--}}
{{--                    @if($role->role_name == 'admin')--}}
{{--                        <a class="dropdown-item" href="{{route('admin.home')}}"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Admin Home</a>--}}
{{--                    @elseif($role->role_name == 'blog_admin')--}}
{{--                        <a class="dropdown-item" href="{{route('blog.home')}}"><i class="bx bx-user font-size-16 align-middle mr-1"></i>Blog Admin Home</a>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--                    <a class="dropdown-item" href="{{route('dashboard')}}"><i class="bx bx-user font-size-16 align-middle mr-1"></i> user Home</a>--}}

{{--                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">--}}
{{--                    <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout--}}
{{--                </a>--}}
{{--                <form action="{{route('logout')}}" method="POST" id="logoutForm">--}}
{{--                    @csrf--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="{{route('admin.home')}}" class="brand-link">
{{--            <img src="{{asset('/')}}admin/images/avatar.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
            <span class="brand-text font-weight-light ml-4 font-weight-bold text-white">{{ env('APP_NAME') }}</span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('/')}}admin/images/avatar.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{route('admin.home')}}" class="d-block">{{$name[0]}}</a>
                </div>
            </div>

            <div class="form-inline">
{{--                <div class="input-group" data-widget="sidebar-search">--}}
{{--                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-sidebar">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column pb-5" data-widget="treeview" role="menu" data-accordion="false">

{{--                    User Manage--}}

                    <li class="nav-item {{ session('lsbm') == 'users'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'users'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User Manage
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.user')}}" class="nav-link {{ session('lsbsm') == 'allUsers'? ' active ' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.create-user')}}" class="nav-link {{ session('lsbsm') == 'createUser'? ' active ' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create User</p>
                                </a>
                            </li>
                        </ul>
                    </li>

{{--                    User Role--}}
                    <li class="nav-item {{ session('lsbm') == 'roles'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'roles'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-diagnoses"></i>
                            <p>
                                User Role
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.manage-role')}}" class="nav-link {{ session('lsbsm') == 'allRoles'? ' active ' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage User Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.assign-role')}}" class="nav-link {{ session('lsbsm') == 'assignRole'? ' active ' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Assign User Role</p>
                                </a>
                            </li>
                        </ul>
                    </li>

{{--                    Company --}}
                    <li class="nav-item {{ session('lsbm') == 'companies'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'companies'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Company Manage
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('company.index')}}" class="nav-link {{ session('lsbsm') == 'allCompanies'? ' active ' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Company</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('company.create')}}" class="nav-link {{ session('lsbsm') == 'createCompany'? ' active ' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Company</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--                    Employee --}}
                    <li class="nav-item {{ session('lsbm') == 'employees'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'employees'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                Employee Manage
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('employee.index')}}" class="nav-link {{ session('lsbsm') == 'allEmployees'? ' active ' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Employee</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('employee.create')}}" class="nav-link {{ session('lsbsm') == 'createEmployee'? ' active ' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Employee</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--                    Holiday --}}
                    <li class="nav-item {{ session('lsbm') == 'holidays'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'holidays'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Holiday
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('holiday.index')}}" class="nav-link {{ session('lsbsm') == 'allHolidays'? ' active ' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Holiday</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('holiday.create')}}" class="nav-link {{ session('lsbsm') == 'createHoliday'? ' active ' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Holiday</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--                    Menu and Page --}}
                    <li class="nav-item {{ session('lsbm') == 'menus' or 'pages' ? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'menus' or 'pages' ? ' active ' : ''}}">
                            <i class="nav-icon fas fa-bezier-curve"></i>
                            <p>
                                Menu & Page
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('menu.index')}}" class="nav-link {{ session('lsbsm') == 'allMenus' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Menu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('menu.create')}}" class="nav-link {{ session('lsbsm') == 'createMenu' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Menu</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('page.index')}}" class="nav-link {{ session('lsbsm') == 'allPages' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page.create')}}" class="nav-link {{ session('lsbsm') == 'createPage' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create page</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--                    Menu-Page --}}
                    <li class="nav-item {{ session('lsbm') == 'menu_pages'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'menu_pages'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-network-wired"></i>
                            <p>
                                Menus Add in Page
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('menu-page.index')}}" class="nav-link {{ session('lsbsm') == 'allMenuPages' ? ' active ' : '' }}">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>All Menu-Page</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a href="{{route('menu-page.create')}}" class="nav-link {{ session('lsbsm') == 'createMenuPage' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add & edit Menu-Page</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{--                    Page Item --}}
                    <li class="nav-item {{ session('lsbm') == 'page_ items'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'page_items'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-file-signature"></i>
                            <p>
                                Page-Item
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('page-item.index')}}" class="nav-link {{ session('lsbsm') == 'allPageItems' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Page-Item</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page-item.create')}}" class="nav-link {{ session('lsbsm') == 'createPageItem' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Page-Item</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{--                    Blog Category --}}
                    <li class="nav-item {{ session('lsbm') == 'blog_categories'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'blog_categories'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-passport"></i>
                            <p>
                                Blog Category
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('blog-category.index')}}" class="nav-link {{ session('lsbsm') == 'allBlogCategories' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Blog Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('blog-category.create')}}" class="nav-link {{ session('lsbsm') == 'createBlogCategory' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Blog Category</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{--                    Blog Sub Category --}}
                    <li class="nav-item {{ session('lsbm') == 'blog_sub_categories'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'blog_sub_categories'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-poll-h"></i>
                            <p>
                                Blog Sub Category
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('blog-sub-category.index')}}" class="nav-link {{ session('lsbsm') == 'allBlogSubCategories' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Blog Sub Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('blog-sub-category.create')}}" class="nav-link {{ session('lsbsm') == 'createBlogSubCategory' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Blog Sub Category</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{--                    Blog Post --}}
                    <li class="nav-item {{ session('lsbm') == 'blog_posts'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'blog_posts'? ' active ' : ''}}">
                            <i class="nav-icon far fa-share-square"></i>
                            <p>
                                Blog Post
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('blog-post.index')}}" class="nav-link {{ session('lsbsm') == 'allBlogPosts' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Blog Posts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('blog-post.create')}}" class="nav-link {{ session('lsbsm') == 'createBlogPost' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Blog Posts</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{--                    Blog Category Post --}}
                    <li class="nav-item {{ session('lsbm') == 'blog_category_posts'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'blog_category_posts'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-pager"></i>
                            <p>
                                Category & Subcategory Post
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('blog-category-post.index')}}" class="nav-link {{ session('lsbsm') == 'allBlogCategoryPosts' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Posts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('blog-category-post.create')}}" class="nav-link {{ session('lsbsm') == 'createBlogCategoryPost' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Posts</p>
                                </a>
                            </li>

                        </ul>
                    </li>

{{--                    --}}{{--                    Blog Subcategory Post --}}
{{--                    <li class="nav-item {{ session('lsbm') == 'blog_subcategory_posts'? ' menu-open ' : ''}}">--}}
{{--                        <a href="#" class="nav-link {{ session('lsbm') == 'blog_subcategory_posts'? ' active ' : ''}}">--}}
{{--                            <i class="nav-icon fas fa-pager"></i>--}}
{{--                            <p>--}}
{{--                                Blog Subcategory Post--}}
{{--                                <i class="fas fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('blog-subcategory-post.index')}}" class="nav-link {{ session('lsbsm') == 'allBlogSubcategoryPosts' ? ' active ' : '' }}">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>All Blog Posts</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('blog-subcategory-post.create')}}" class="nav-link {{ session('lsbsm') == 'createBlogSubcategoryPost' ? ' active ' : '' }}">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Create Blog Posts</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

                    {{--                    Office Location --}}
                    <li class="nav-item {{ session('lsbm') == 'office_locations'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'office_locations'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-globe-europe"></i>
                            <p>
                                Office Location
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('office-location.index')}}" class="nav-link {{ session('lsbsm') == 'allOfficeLocations' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Office Location</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('office-location.create')}}" class="nav-link {{ session('lsbsm') == 'createOfficeLocation' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Office Location</p>
                                </a>
                            </li>

                        </ul>
                    </li>


                    {{-- Leave --}}
                    <li class="nav-item {{ session('lsbm') == 'leaves'? ' menu-open ' : ''}}">
                        <a href="#" class="nav-link {{ session('lsbm') == 'leaves'? ' active ' : ''}}">
                            <i class="nav-icon fas fa-dna"></i>
                            <p>
                                Leave
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('leave.index')}}" class="nav-link {{ session('lsbsm') == 'allLeaves' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Leaves</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('leave.create')}}" class="nav-link {{ session('lsbsm') == 'createLeave' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Leave</p>
                                </a>
                            </li>

                        </ul>
                    </li>


                </ul>
            </nav>

        </div>

    </aside>

    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">

                @yield('body')

            </div>
        </section>

    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="https://adminlte.io/">{{env('APP_NAME')}}</a>.</strong>
        All rights reserved.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

</div>


<script src="{{asset('/')}}admin/plugins/jquery/jquery.min.js"></script>

<script src="{{asset('/')}}admin/plugins/jquery-ui/jquery-ui.min.js"></script>

{{--<script>--}}
{{--    $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}

<script src="{{asset('/')}}admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('/')}}admin/plugins/chart.js/Chart.min.js"></script>

<script src="{{asset('/')}}admin/plugins/sparklines/sparkline.js"></script>


<script src="{{asset('/')}}admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('/')}}admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="{{asset('/')}}admin/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="{{asset('/')}}admin/plugins/moment/moment.min.js"></script>
<script src="{{asset('/')}}admin/plugins/daterangepicker/daterangepicker.js"></script>

<script src="{{asset('/')}}admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="{{asset('/')}}admin/plugins/summernote/summernote-bs4.min.js"></script>

<script src="{{asset('/')}}admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
{{--summernote--}}
<script src="{{asset('/')}}admin/plugins/summernote/summernote-bs4.min.js"></script>
{{--Data Table--}}
<script src="{{asset('/')}}admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/')}}admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/')}}admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


{{--switch--}}
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script src="{{asset('/')}}admin/dist/js/adminlte2167.js?v=3.2.0"></script>

{{--<script src="{{asset('/')}}admin/dist/js/demo.js"></script>--}}

{{--Notification--}}
<script src="{{asset('/')}}admin/toastifyNotification/toastify.js"></script>
{{------}}

<!--===== SORTABLE JS =====-->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

{{--summernote--}}
<script>
    $(function () {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>
<script>
    @if(Session::has('success'))
    Toastify({ text: "{{ Session::get('success') }}", duration: 3000,
        style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();

    @elseif(Session::has('warning'))
    Toastify({ text: "{{ Session::get('warning') }}", duration: 3000,
        style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();

    @elseif(Session::has('error'))
    Toastify({ text: "{{ Session::get('error') }}", duration: 3000,
        style: { background: "linear-gradient(to right, #00b09b, #96c93d)",
            color:'#f51804'
        }
    }).showToast();

    @endif
</script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script>
    /*===== DRAG and DROP =====*/
    const dropItems = document.getElementById('drop-items')

    new Sortable(dropItems, {
        animation: 350,
        chosenClass: "sortable-chosen",
        dragClass: "sortable-drag",
        store: {
            // We keep the order of the list
            set: (sortable) =>{
                const order = sortable.toArray()
                localStorage.setItem(sortable.options.group.name, order.join('|'))
            },

            // We get the order of the list
            get: (sortable) =>{
                const order = localStorage.getItem(sortable.options.group.name)
                return order ? order.split('|') : []
            }
        }
    });
</script>
@yield('script')
</body>

<!-- Mirrored from adminlte.io/themes/v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Dec 2022 15:56:48 GMT -->
</html>

