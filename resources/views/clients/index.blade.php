@extends('layouts.app')

@section('title')
Clients
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Clients</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Clients</li>
                </ul>
            </div>
            <div class="col-auto float-end ms-auto">
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_client"><i class="fa fa-plus"></i> Add Client</a>
                <div class="view-icons">
                    <a href="{{ route('dashboard.clients') }}" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                    <a href="{{ route('dashboard.clients', ['display' => 'list']) }}" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>


    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating">
                <label class="focus-label">Client ID</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating">
                <label class="focus-label">Client Name</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus select-focus">
                <select class="select floating">
                    <option>Select Company</option>
                    <option>Global Technologies</option>
                    <option>Delta Infotech</option>
                </select>
                <label class="focus-label">Company</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="d-grid">
                <a href="#" class="btn btn-success"> Search </a>
            </div>
        </div>
    </div>

    @if(count($clients) > 0)
        @if(request()->query('display') == 'list')
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
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
        </div>
        @else
        <div class="row staff-grid-row">
            @foreach($clients as $client)
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="{{ route('dashboard.clients.profile', ['slug' => $client->slug]) }}" class="avatar"><img alt="" src="{{ $client->profile_pic_url }}"></a>
                        </div>
                        
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="{{ '#edit_client_' . $client->id }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="{{ '#delete_client_' . $client->id }}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                <a class="dropdown-item" href="{{ route('dashboard.tickets', ['add-ticket' => $client->id]) }}"><i class="fa fa-ticket m-r-5"></i> Create Ticket</a>
                            </div>
                        </div>
                        
                        {{-- <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('dashboard.clients.profile', ['slug' => $client->slug]) }}">Global Technologies</a></h4> --}}
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('dashboard.clients.profile', ['slug' => $client->slug]) }}">{{ $client->full_name }}</a></h4>
                        
                        <div class="small text-muted">{{ strtoupper($client->role) }}</div>
                        
                        <a href="{{ route('dashboard.clients.records', ['slug' => $client->slug]) }}" class="btn btn-white btn-sm m-t-10">View Records</a>
                        <a href="{{ route('dashboard.clients.profile', ['slug' => $client->slug]) }}" class="btn btn-white btn-sm m-t-10">View Profile</a>
                    </div>
                </div>

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
        </div>
        @endif
    @endif
</div>

<div id="add_client" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Client</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('dashboard.clients.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name') }}">
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
                                <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name') }}">
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
                                <input class="form-control floating @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}">
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
                                <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Address</label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ old('address') }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Confirm Password</label>
                                <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation">
                            </div>
                        </div> --}}
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/task.init.js') }}"></script>
@endsection
