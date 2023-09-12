@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<?php
    $clients = \App\Models\User::where('role', 'client')->limit(4)->get();
    $employees = \App\Models\User::where('role', 'employee')->limit(4)->get();
    $tickets = \App\Models\Ticket::all();
    $records = \App\Models\Record::all();
    // $total = $records->sum('amount');

    $records_chart = [];

    for($i = 1; $i <= 12; $i++) {
        /********************
         * Example object:
         * {
         *      y: 'January',
         *      a: 100
         * }
        *********************/
        $records_chart[] = [
            'y' => date('F', strtotime('2020-' . $i . '-01')),
            'a' => \App\Models\Record::whereMonth('date', $i)->sum('amount')
        ];
    }

    $new_clients = \App\Models\User::where('role', 'client')->whereBetween('created_at', [now()->subDays(7), now()])->count();
    $new_employees = \App\Models\User::where('role', 'employee')->whereBetween('created_at', [now()->subDays(7), now()])->count();
    $records_this_month = \App\Models\Record::whereMonth('date', date('m'))->sum('amount');
    $new_tickets = \App\Models\Ticket::whereBetween('created_at', [now()->subDays(7), now()])->count();
    $solved_tickets = \App\Models\Ticket::where('status', 'solved')->count();
?>
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Welcome Admin!</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <i class="fa fa-usd"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3>{{ $clients->count() }}</h3>
                        <span>Clients</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <i class="fa fa-user"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3>{{ $employees->count() }}</h3>
                        <span>Employees</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <i class="fa fa-database"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3>{{ $records->count() }}</h3>
                        <span>Records</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <i class="fa fa-ticket"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3>{{ $tickets->count() }}</h3>
                        <span>Tickets</span>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <i class="fa fa-diamond"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3>37</h3>
                        <span>Tasks</span>
                    </div>
                </div>
            </div>
        </div> --}}
        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Total Records (Bar)</h3>
                            <div id="bar-charts"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Total Records (Line)</h3>
                            <div id="line-charts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-group m-b-30">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex
                                justify-content-between mb-3">
                            <div>
                                <span class="d-block">New Clients</span>
                            </div>
                            <div>
                                <span class="text-success">+{{ $new_clients }}</span>
                            </div>
                        </div>
                        <h3 class="mb-3">{{ $new_clients }}</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mb-0">Overall Clients <span class="text-muted">{{ $clients->count() }}</span></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex
                                justify-content-between mb-3">
                            <div>
                                <span class="d-block">New Employees</span>
                            </div>
                            <div>
                                <span class="text-success">+{{ $new_employees }}</span>
                            </div>
                        </div>
                        <h3 class="mb-3">{{ $new_employees }}</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mb-0">Overall Employees <span class="text-muted">{{ $employees->count() }}</span></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex
                                justify-content-between mb-3">
                            <div>
                                <span class="d-block">New Tickets</span>
                            </div>
                            <div>
                                <span class="text-success">+{{ $new_tickets }}</span>
                            </div>
                        </div>
                        <h3 class="mb-3">{{ $new_tickets }}</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mb-0">Overall Tickets <span class="text-muted">{{ $tickets->count() }}</span></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex
                                justify-content-between mb-3">
                            <div>
                                <span class="d-block">Records</span>
                            </div>
                            <div>
                                <span class="text-success">+12.5%</span>
                            </div>
                        </div>
                        <h3 class="mb-3">₦{{ $records_this_month }}</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mb-0">Total amount <span class="text-muted">₦{{ $records->sum('amount') }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
            <div class="card flex-fill dash-statistics">
                <div class="card-body">
                    <h5 class="card-title">Statistics</h5>
                    <div class="stats-list">
                        <div class="stats-info">
                            <p>Today Leave <strong>4 <small>/ 65</small></strong></p>
                            <div class="progress">
                                <div class="progress-bar
                                        bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="stats-info">
                            <p>Pending Invoice <strong>15
                                    <small>/ 92</small></strong></p>
                            <div class="progress">
                                <div class="progress-bar
                                        bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="stats-info">
                            <p>Completed Projects <strong>85
                                    <small>/ 112</small></strong></p>
                            <div class="progress">
                                <div class="progress-bar
                                        bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="stats-info">
                            <p>Open Tickets <strong>190 <small>/
                                        212</small></strong></p>
                            <div class="progress">
                                <div class="progress-bar
                                        bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="stats-info">
                            <p>Closed Tickets <strong>22 <small>/
                                        212</small></strong></p>
                            <div class="progress">
                                <div class="progress-bar
                                        bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        
        <div class="col-md-12 col-lg-12 col-xl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-body">
                    <h4 class="card-title">Ticket Statistics</h4>
                    <div class="statistics">
                        <div class="row">
                            <div class="col-md-6 col-6
                                    text-center">
                                <div class="stats-box mb-4">
                                    <p>Total Tickets</p>
                                    <h3>{{ $tickets->count() }}</h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-6
                                    text-center">
                                <div class="stats-box mb-4">
                                    <p>Solved Tickets</p>
                                    <h3>{{ $solved_tickets }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-purple" role="progressbar" style="width:
                                30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                        <div class="progress-bar bg-warning" role="progressbar" style="width:
                                22%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">22%</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width:
                                24%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">24%</div>
                        <div class="progress-bar bg-danger" role="progressbar" style="width:
                                26%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">21%</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width:
                                10%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">10%</div>
                    </div>
                    <div>
                        <p><i class="fa fa-dot-circle-o text-purple me-2"></i>Open Tickets <span class="float-end">{{  \App\Models\Ticket::where('status', 'open')->count(); }}</span></p>
                        <p><i class="fa fa-dot-circle-o text-warning me-2"></i>Inprogress Tickets <span class="float-end">{{ \App\Models\Ticket::where('status', 'pending')->count() }}</span></p>
                        <p><i class="fa fa-dot-circle-o text-success me-2"></i>Pending Tickets <span class="float-end">{{ \App\Models\Ticket::where('status', 'solved')->count() }}</span></p>
                        <p><i class="fa fa-dot-circle-o text-danger me-2"></i>Re-Opened Tickets <span class="float-end">{{ \App\Models\Ticket::where('status', 'reopened')->count() }}</span></p>
                        <p class="mb-0"><i class="fa fa-dot-circle-o text-info me-2"></i>Total Tickets <span class="float-end">{{ $tickets->count() }}</span></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
            <div class="card flex-fill">
                <div class="card-body">
                    <h4 class="card-title">Today Absent <span class="badge bg-inverse-danger
                                ms-2">5</span></h4>
                    <div class="leave-info-box">
                        <div class="media d-flex
                                align-items-center">
                            <a href="profile.html" class="avatar"><img alt=""src="{{ asset('images/user.jpg') }}"></a>
                            <div class="media-body flex-grow-1">
                                <div class="text-sm my-0">Martin
                                    Lewis</div>
                            </div>
                        </div>
                        <div class="row align-items-center
                                mt-3">
                            <div class="col-6">
                                <h6 class="mb-0">4 Sep 2019</h6>
                                <span class="text-sm
                                        text-muted">Leave Date</span>
                            </div>
                            <div class="col-6 text-end">
                                <span class="badge
                                        bg-inverse-danger">Pending</span>
                            </div>
                        </div>
                    </div>
                    <div class="leave-info-box">
                        <div class="media d-flex
                                align-items-center">
                            <a href="profile.html" class="avatar"><img alt=""src="{{ asset('images/user.jpg') }}"></a>
                            <div class="media-body flex-grow-1">
                                <div class="text-sm my-0">Martin
                                    Lewis</div>
                            </div>
                        </div>
                        <div class="row align-items-center
                                mt-3">
                            <div class="col-6">
                                <h6 class="mb-0">4 Sep 2019</h6>
                                <span class="text-sm
                                        text-muted">Leave Date</span>
                            </div>
                            <div class="col-6 text-end">
                                <span class="badge
                                        bg-inverse-success">Approved</span>
                            </div>
                        </div>
                    </div>
                    <div class="load-more text-center">
                        <a class="text-dark" href="javascript:void(0);">Load More</a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card card-table flex-fill">
                <div class="card-header">
                    <h3 class="card-title mb-0">Clients</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Client ID</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{ route('dashboard.clients.profile', ['slug' => $client->slug]) }}" class="avatar">
                                                    <img src="{{ $client->profile_pic_url }}" alt="">
                                                </a>
                                                <a href="{{ route('dashboard.clients.profile', ['slug' => $client->slug]) }}">
                                                    {{ $client->full_name }}
                                                </a>
                                            </h2>
                                        </td>
                                        <td>CLT-00{{ $client->id }}</td>
                                        <td>
                                            <a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
                                        </td>
                                        <td>
                                            <a href="tel:{{ $client->phone }}">{{ $client->phone }}</a>
                                        </td>
                                        
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-success"></i> Active 
                                                </a>
                                            </div>
                                        </td>

                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="{{ '#edit_client_' . $client->id }}">
                                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="{{ '#delete_client_' . $client->id }}">
                                                        <i class="fa fa-trash-o m-r-5"></i> Delete
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('dashboard.tickets', ['add-ticket' => $client->id]) }}" >
                                                        <i class="fa fa-ticket m-r-5"></i> Create Ticket
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Edit Client Modal -->
                                    <div id="{{ 'edit_client_' . $client->id }}" class="modal custom-modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Client</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('dashboard.clients.update', $client->id) }}" method="POST">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                                                    <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $client->first_name }}">
                                                                    @error('first_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Last Name</label>
                                                                    <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ $client->last_name }}">
                                                                    @error('last_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                                                    <input class="form-control floating @error('email') is-invalid @enderror" type="email" name="email" value="{{ $client->email }}">
                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Phone </label>
                                                                    <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ $client->phone }}">
                                                                    @error('phone')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Address</label>
                                                                    <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ $client->address }}">
                                                                    @error('address')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="submit-section">
                                                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Edit Client Modal -->
                                    
                                    <!-- Delete Client Modal -->
                                    <div id="{{ 'delete_client_' . $client->id }}" class="modal custom-modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="form-header">
                                                        <h3>Delete Client</h3>
                                                        <p>Are you sure want to delete?</p>
                                                    </div>
                                                    <div class="modal-btn delete-action">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <a href="javascript:void(0);" class="btn btn-primary continue-btn" onclick="event.preventDefault(); document.getElementById('{{ 'delete-client-form-' . $client->id }}').submit();">Delete</a>
                                                            </div>
                                                            <div class="col-6">
                                                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form class="d-none" id="{{ 'delete-client-form-' . $client->id }}" action="{{ route('dashboard.clients.destroy', $client->id) }}" method="POST">
                                        @csrf
                                    </form>
                                    <!-- /Delete Client Modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('dashboard.clients') }}">View all clients</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 d-flex">
            <div class="card card-table flex-fill">
                <div class="card-header">
                    <h3 class="card-title mb-0">Employees</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Employee ID</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-nowrap">Join Date</th>
                                    <th>Designation</th>
                                    <th class="text-end no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{ route('dashboard.employees.profile', ['slug' => $employee->slug]) }}" class="avatar">
                                                    <img alt="" src="{{ $employee->profile_pic_url }}" class="w-100 h-100">
                                                </a>
                                                <a href="{{ route('dashboard.employees.profile', ['slug' => $employee->slug]) }}">{{ $employee->full_name }} <span>{{ $employee->designation }}</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0001</td>
                                        <td><a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></td></td>
                                        <td><a href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a></td>
                                        <td>{{ $employee->created_at->format('d M Y') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ $employee->designation }}</a>
                                                <div class="dropdown-menu">
                                                    @foreach($employee->designations as $designation)
                                                        <a class="dropdown-item" href="#">{{ $designation->name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="{{ '#edit_employee_' . $employee->id }}">
                                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="{{ '#delete_employee_' . $employee->id }}">
                                                        <i class="fa fa-trash-o m-r-5"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Edit Employee Modal -->
                                    <div id="{{ 'edit_employee_' . $employee->id }}" class="modal custom-modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Employee</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('dashboard.employees.update', $employee->id) }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                                                    <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $employee->first_name }}">
                                                                    @error('first_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Last Name</label>
                                                                    <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ $employee->last_name }}">
                                                                    @error('last_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $employee->email }}">
                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Phone </label>
                                                                    <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ $employee->phone }}">
                                                                    @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label>Designation <span class="text-danger">*</span></label>
                                                                    <select class="select @error('designation') is-invalid @enderror" name="designation">
                                                                        @foreach (\App\Models\Designation::all() as $designation)
                                                                            <option value="{{ $designation->id }}" {{ $employee->designation == $designation->name ? 'selected' : '' }}>{{ $designation->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="submit-section">
                                                            <button class="btn btn-primary submit-btn">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Edit Employee Modal -->
                                
                                    <!-- Delete Employee Modal -->
                                    <div id="{{ 'delete_employee_' . $employee->id }}" class="modal custom-modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="form-header">
                                                        <h3>Delete Employee</h3>
                                                        <p>Are you sure want to delete?</p>
                                                    </div>
                                                    <div class="modal-btn delete-action">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <a href="javascript:void(0);" class="btn btn-primary continue-btn" onclick="event.preventDefault(); document.getElementById('{{ 'delete-employee-form-' . $employee->id }}').submit();">Delete</a>
                                                            </div>
                                                            <div class="col-6">
                                                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form class="d-none" id="{{ 'delete-employee-form-' . $employee->id }}" action="{{ route('dashboard.employees.destroy', $employee->id) }}" method="POST">
                                        @csrf
                                    </form>
                                    <!-- /Delete Employee Modal -->
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('dashboard.employees') }}">View all employees</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('js/morris.min.js') }}"></script>
    <script src="{{ asset('js/raphael.min.js') }}"></script>
    {{-- <script src="{{ asset('js/chart.init.js') }}"></script> --}}

    <script>
        var records_chart = @json($records_chart, JSON_PRETTY_PRINT);

        $(document).ready(function () {
            // Bar Chart total records per month in current year
            Morris.Bar({
                element: 'bar-charts',
                data: records_chart,
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Total Records ₦'],
                lineColors: ['#ff9b44'],
                lineWidth: '3px',
                barColors: ['#ff9b44'],
                resize: true,
                redraw: true
            });

            Morris.Line({
                element: 'line-charts',
                data: records_chart,
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Total Records ₦'],
                lineColors: ['#ff9b44'],
                lineWidth: '3px',
                resize: true,
                redraw: true
            });
        });
    </script>
@endsection