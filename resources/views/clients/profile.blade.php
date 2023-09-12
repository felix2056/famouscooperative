@extends('layouts.app')

@section('title')
Profile
@endsection

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="">
                                    <img src="{{ $client->profile_pic_url }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0">{{ $client->full_name }}</h3>
                                        
                                        <small class="text-muted">{{ strtoupper($client->role) }}</small>
                                        <div class="staff-id">Client ID : CLT-00{{ $client->id }}</div>

                                        <div class="staff-msg">
                                            <a href="{{ route('dashboard.clients.records', ['slug' => $client->slug]) }}" class="btn btn-custom">View Records</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="mailto:{{ $client->email }}">{{ $client->email ?? 'N\A' }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="tel:{{ $client->phone }}">{{ $client->phone ?? 'N\A' }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Birthday:</span>
                                            <span class="text">{{ $client->date_of_birth ?? 'N\A' }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">{{ $client->address ?? 'N\A' }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Gender:</span>
                                            <span class="text">{{ $client->gender ?? 'N\A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card tab-box">
        <div class="row user-tabs">
            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    {{-- <li class="nav-item col-sm-3"><a class="nav-link" data-bs-toggle="tab" href="#myprojects">Projects</a></li> --}}
                    <li class="nav-item col-sm-3"><a class="nav-link active" data-bs-toggle="tab" href="#tickets">Tickets</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content profile-tab-content">
                {{-- <div id="myprojects" class="tab-pane fade">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Office
                                            Management</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">1</span> <span class="text-muted">open tasks,
                                        </span>
                                        <span class="text-xs">9</span> <span class="text-muted">tasks
                                            completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing
                                        and
                                        typesetting industry. When an unknown printer took a galley of type
                                        and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt=""src="{{ asset('images/avatar-16.jpg') }}"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt=""src="{{ asset('images/avatar-02.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt=""src="{{ asset('images/avatar-09.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt=""src="{{ asset('images/avatar-10.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt=""src="{{ asset('images/avatar-05.jpg') }}"></a>
                                            </li>
                                            <li class="dropdown avatar-dropdown">
                                                <a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">+15</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <div class="avatar-group">
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-02.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-09.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-10.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-05.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-11.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-12.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-13.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-01.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-16.jpg') }}">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-pagination">
                                                        <ul class="pagination">
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Previous">
                                                                    <span aria-hidden="true">«</span>
                                                                    <span class="visually-hidden">Previous</span>
                                                                </a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Next">
                                                                    <span aria-hidden="true">»</span>
                                                                    <span class="visually-hidden">Next</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div class="progress-bar bg-success" role="progressbar" data-bs-toggle="tooltip" title="40%" style="width: 40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Project
                                            Management</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">2</span> <span class="text-muted">open tasks,
                                        </span>
                                        <span class="text-xs">5</span> <span class="text-muted">tasks
                                            completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing
                                        and
                                        typesetting industry. When an unknown printer took a galley of type
                                        and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt=""src="{{ asset('images/avatar-16.jpg') }}"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt=""src="{{ asset('images/avatar-02.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt=""src="{{ asset('images/avatar-09.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt=""src="{{ asset('images/avatar-10.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt=""src="{{ asset('images/avatar-05.jpg') }}"></a>
                                            </li>
                                            <li class="dropdown avatar-dropdown">
                                                <a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">+15</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <div class="avatar-group">
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-02.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-09.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-10.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-05.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-11.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-12.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-13.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-01.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-16.jpg') }}">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-pagination">
                                                        <ul class="pagination">
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Previous">
                                                                    <span aria-hidden="true">«</span>
                                                                    <span class="visually-hidden">Previous</span>
                                                                </a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Next">
                                                                    <span aria-hidden="true">»</span>
                                                                    <span class="visually-hidden">Next</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div class="progress-bar bg-success" role="progressbar" data-bs-toggle="tooltip" title="40%" style="width: 40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Video Calling
                                            App</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">3</span> <span class="text-muted">open tasks,
                                        </span>
                                        <span class="text-xs">3</span> <span class="text-muted">tasks
                                            completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing
                                        and
                                        typesetting industry. When an unknown printer took a galley of type
                                        and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt=""src="{{ asset('images/avatar-16.jpg') }}"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt=""src="{{ asset('images/avatar-02.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt=""src="{{ asset('images/avatar-09.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt=""src="{{ asset('images/avatar-10.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt=""src="{{ asset('images/avatar-05.jpg') }}"></a>
                                            </li>
                                            <li class="dropdown avatar-dropdown">
                                                <a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">+15</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <div class="avatar-group">
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-02.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-09.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-10.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-05.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-11.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-12.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-13.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-01.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-16.jpg') }}">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-pagination">
                                                        <ul class="pagination">
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Previous">
                                                                    <span aria-hidden="true">«</span>
                                                                    <span class="visually-hidden">Previous</span>
                                                                </a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Next">
                                                                    <span aria-hidden="true">»</span>
                                                                    <span class="visually-hidden">Next</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div class="progress-bar bg-success" role="progressbar" data-bs-toggle="tooltip" title="40%" style="width: 40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Hospital
                                            Administration</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">12</span> <span class="text-muted">open tasks,
                                        </span>
                                        <span class="text-xs">4</span> <span class="text-muted">tasks
                                            completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing
                                        and
                                        typesetting industry. When an unknown printer took a galley of type
                                        and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt=""src="{{ asset('images/avatar-16.jpg') }}"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt=""src="{{ asset('images/avatar-02.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt=""src="{{ asset('images/avatar-09.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt=""src="{{ asset('images/avatar-10.jpg') }}"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt=""src="{{ asset('images/avatar-05.jpg') }}"></a>
                                            </li>
                                            <li class="dropdown avatar-dropdown">
                                                <a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">+15</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <div class="avatar-group">
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-02.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-09.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-10.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-05.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-11.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-12.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-13.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-01.jpg') }}">
                                                        </a>
                                                        <a class="avatar avatar-xs" href="#">
                                                            <img alt=""src="{{ asset('images/avatar-16.jpg') }}">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-pagination">
                                                        <ul class="pagination">
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Previous">
                                                                    <span aria-hidden="true">«</span>
                                                                    <span class="visually-hidden">Previous</span>
                                                                </a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Next">
                                                                    <span aria-hidden="true">»</span>
                                                                    <span class="visually-hidden">Next</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div class="progress-bar bg-success" role="progressbar" data-bs-toggle="tooltip" title="40%" style="width: 40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div id="tickets" class="tab-pane fade show active">
                    <div class="project-task">
                        <ul class="nav nav-tabs nav-tabs-top nav-justified mb-0">
                            <li class="nav-item"><a class="nav-link active" href="#all_tickets" data-bs-toggle="tab" aria-expanded="true">All Tickets</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pending_tickets" data-bs-toggle="tab" aria-expanded="false">Pending Tickets</a></li>
                            <li class="nav-item"><a class="nav-link" href="#completed_tickets" data-bs-toggle="tab" aria-expanded="false">Completed Tickets</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="all_tickets">
                                <div class="task-wrapper">
                                    <div class="task-list-container">
                                        <div class="task-list-body">
                                            <ul id="task-list">
                                                @foreach($client->tickets as $ticket)
                                                <li class="@if($ticket->status == 'solved') completed @endif task">
                                                    <div class="task-container">
                                                        <span class="task-action-btn task-check">
                                                            {{-- <span class="action-circle large complete-btn" title="Mark Complete">
                                                                <i class="material-icons">check</i>
                                                            </span> --}}
                                                        </span>
                                                        <span class="task-label" contenteditable="true">
                                                            <a href="{{ route('dashboard.tickets.show', ['slug' => $ticket->slug]) }}">{{ $ticket->title }}</a>
                                                        </span>
                                                        {{-- <span class="task-action-btn task-btn-right">
                                                            <span class="action-circle large" title="Assign">
                                                                <i class="material-icons">person_add</i>
                                                            </span>
                                                            <span class="action-circle large delete-btn" title="Delete Task">
                                                                <i class="material-icons">delete</i>
                                                            </span>
                                                        </span> --}}
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="task-list-footer">
                                            <div class="new-task-wrapper">
                                                <textarea id="new-task" placeholder="Enter new task here. . ."></textarea>
                                                <span class="error-message hidden">You need to enter a task
                                                    first</span>
                                                <span class="add-new-task-btn btn" id="add-task">Add
                                                    Task</span>
                                                <span class="btn" id="close-task-panel">Close</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pending_tickets">
                                <div class="task-wrapper">
                                    <div class="task-list-container">
                                        <div class="task-list-body">
                                            <ul id="task-list">
                                                @foreach($client->tickets()->where('status', '!=', 'solved')->get() as $ticket)
                                                <li class="task">
                                                    <div class="task-container">
                                                        <span class="task-action-btn task-check">
                                                            {{-- <span class="action-circle large complete-btn" title="Mark Complete">
                                                                <i class="material-icons">check</i>
                                                            </span> --}}
                                                        </span>
                                                        <span class="task-label" contenteditable="true">
                                                            <a href="{{ route('dashboard.tickets.show', ['slug' => $ticket->slug]) }}">{{ $ticket->title }}</a>
                                                        </span>
                                                        {{-- <span class="task-action-btn task-btn-right">
                                                            <span class="action-circle large" title="Assign">
                                                                <i class="material-icons">person_add</i>
                                                            </span>
                                                            <span class="action-circle large delete-btn" title="Delete Task">
                                                                <i class="material-icons">delete</i>
                                                            </span>
                                                        </span> --}}
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="task-list-footer">
                                            <div class="new-task-wrapper">
                                                <textarea id="new-task" placeholder="Enter new task here. . ."></textarea>
                                                <span class="error-message hidden">You need to enter a task
                                                    first</span>
                                                <span class="add-new-task-btn btn" id="add-task">Add
                                                    Task</span>
                                                <span class="btn" id="close-task-panel">Close</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="completed_tickets">
                                <div class="task-wrapper">
                                    <div class="task-list-container">
                                        <div class="task-list-body">
                                            <ul id="task-list">
                                                @foreach($client->tickets()->where('status', 'solved')->get() as $ticket)
                                                <li class="completed task">
                                                    <div class="task-container">
                                                        <span class="task-action-btn task-check">
                                                            {{-- <span class="action-circle large complete-btn" title="Mark Complete">
                                                                <i class="material-icons">check</i>
                                                            </span> --}}
                                                        </span>
                                                        <span class="task-label" contenteditable="true">
                                                            <a href="{{ route('dashboard.tickets.show', ['slug' => $ticket->slug]) }}">{{ $ticket->title }}</a>
                                                        </span>
                                                        {{-- <span class="task-action-btn task-btn-right">
                                                            <span class="action-circle large" title="Assign">
                                                                <i class="material-icons">person_add</i>
                                                            </span>
                                                            <span class="action-circle large delete-btn" title="Delete Task">
                                                                <i class="material-icons">delete</i>
                                                            </span>
                                                        </span> --}}
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="task-list-footer">
                                            <div class="new-task-wrapper">
                                                <textarea id="new-task" placeholder="Enter new task here. . ."></textarea>
                                                <span class="error-message hidden">You need to enter a task
                                                    first</span>
                                                <span class="add-new-task-btn btn" id="add-task">Add
                                                    Task</span>
                                                <span class="btn" id="close-task-panel">Close</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
