<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    
    <meta name="author" content="Daniel Felix - CodeBreaker">
    <meta name="robots" content="noindex, nofollow">

    <title>@yield('title') - Famous Co-operative</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ \App\Models\ThemeSetting::first()->website_favicon }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">

    <link href="{{ asset('css/morris.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="{{ \App\Models\ThemeSetting::first()->website_favicon }}" width="40" height="40" alt="">
                </a>
            </div>

            <a id="toggle_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <div class="page-title-box">
                <h3>{{ \App\Models\ThemeSetting::first()->website_name }}</h3>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

            <ul class="nav user-menu">

                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="search">
                            <input class="form-control" type="text" placeholder="Search here">
                            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>


                <li class="nav-item dropdown has-arrow flag-nav">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                        <img src="{{ asset('images/us.png') }}" alt="" height="20"> <span>English</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('images/us.png') }}" alt="" height="16">
                            English
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('images/fr.png') }}" alt="" height="16">
                            French
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('images/es.png') }}" alt="" height="16">
                            Spanish
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('images/de.png') }}" alt="" height="16">
                            German
                        </a>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <i class="fa fa-bell-o"></i> <span class="badge rounded-pill">3</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            {{-- <a href="javascript:void(0)" class="clear-noti">Clear All </a> --}}
                        </div>
                        <div class="noti-content">
                            @if(count(\App\Models\Log::all()) > 0)
                            <ul class="notification-list">
                                @foreach(\App\Models\Log::latest()->limit(10)->get() as $log)
                                <li class="notification-message">
                                    <a href="javascript:void(0)">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="{{ $log->image }}">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details">
                                                    <span class="noti-title">{{ $log->message }}</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">{{ $log->created_at->diffForHumans() }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <ul class="notification-list">
                                <li class="notification-message text-center">
                                    <p>No notifications</p>
                                </li>
                            </ul>
                            @endif
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="{{ route('dashboard.activities') }}">View all Notifications</a>
                        </div>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <i class="fa fa-comment-o"></i> 
                        <span class="badge rounded-pill">8</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Messages</span>
                            {{-- <a href="javascript:void(0)" class="clear-noti">Clear All </a> --}}
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                @foreach(\App\Models\TicketChat::latest()->limit(10)->get() as $chat)
                                <li class="notification-message">
                                    <a href="{{ route('dashboard.tickets.show', ['slug' => $chat->ticket->slug]) }}">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="{{ $chat->user->full_name }}" src="{{ $chat->user->profile_pic_url }}">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">{{ $chat->user->full_name }}</span>
                                                <span class="message-time">{{ $chat->created_at->diffForHumans() }}</span>
                                                <div class="clearfix"></div>
                                                
                                                <span class="message-content">{{ $chat->message }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="{{ route('dashboard.tickets') }}">View all Messages</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img src="{{ Auth::user()->profile_pic_url }}" alt="">
                            <span class="status online"></span>
                        </span>
                        <span>{{ strtoupper(Auth::user()->role) }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('dashboard.employees.profile', ['slug' => Auth::user()->slug]) }}">My Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                </li>
            </ul>

            <div class="dropdown mobile-user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('dashboard.employees.profile', ['slug' => Auth::user()->slug]) }}">My Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main</span>
                        </li>

                        <li>
                            <a href="{{ route('dashboard') }}"><i class="la la-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-title">
                            <span>Employees</span>
                        </li>

                        <li>
                            <a href="{{ route('dashboard.employees') }}"><i class="la la-user"></i>
                                <span>Employees</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="{{ route('dashboard.clients') }}"><i class="la la-users"></i>
                                <span>Clients</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="{{ route('dashboard.tickets') }}"><i class="la la-ticket"></i>
                                <span>Tickets</span>
                            </a>
                        </li>
                        
                        <li class="menu-title">
                            <span>Administration</span>
                        </li>
                        <li class="">
                            <a href="{{ route('dashboard.knowledge-base') }}">
                                <i class="la la-question"></i> 
                                <span>Knowledgebase</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('dashboard.activities') }}">
                                <i class="la la-bell"></i>
                                <span>Activities</span></a>
                        </li>
                        <li class="">
                            <a href="{{ route('dashboard.admin.users') }}">
                                <i class="la la-user-plus"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="menu-title">
                            <span>Settings</span>
                        </li>
                        <li class="">
                            <a href="{{ route('dashboard.admin.company-settings') }}">
                                <i class="la la-building"></i> 
                                <span>Company Settings</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="{{ route('dashboard.admin.theme-settings') }}">
                                <i class="la la-photo"></i> 
                                <span>Theme Settings</span>
                            </a>
                        </li>
                        
                        <li class="menu-title">
                            <span>Extras</span>
                        </li>
                        <li>
                            <a href="#"><i class="la la-file-text"></i>
                                <span>Documentation</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="la
                                        la-info"></i> <span>Change Log</span>
                                <span class="badge badge-primary ms-auto">v3.4</span></a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="la
                                        la-share-alt"></i> <span>Multi Level</span>
                                <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Level
                                            1</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);"><span>Level
                                                    2</span></a></li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);">
                                                <span> Level 2</span> <span class="menu-arrow"></span></a>
                                            <ul style="display: none;">
                                                <li><a href="javascript:void(0);">Level
                                                        3</a></li>
                                                <li><a href="javascript:void(0);">Level
                                                        3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);">
                                                <span>Level 2</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"> <span>Level
                                            1</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>

    <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>

    <script data-cfasync="false" src="{{ asset('js/email-decode.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/libs/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/libs/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/libs/datatable.init.js') }}"></script>

    <script src="{{ asset('js/slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/slimscroll.init.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('js/libs/select2.min.js') }}"></script>
    <script src="{{ asset('js/libs/select2.init.js') }}"></script>

    <script src="{{ asset('js/app.min.js') }}"></script>

    <script
        src="https://smarthr.dreamguystech.com/smarthr-laravel/orange/public/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script
        src="https://smarthr.dreamguystech.com/smarthr-laravel/orange/public/assets/js/pages/datetimepicker.init.js"></script>

    @yield('scripts')
</body>

</html>