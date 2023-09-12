@extends('layouts.app')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Tickets</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tickets</li>
                </ul>
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_ticket"><i class="fa fa-plus"></i> Add Ticket</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-group m-b-30">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">New Tickets</span>
                            </div>
                            <div>
                                <span class="text-success">+10%</span>
                            </div>
                        </div>
                        <h3 class="mb-3">112</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">Solved Tickets</span>
                            </div>
                            <div>
                                <span class="text-success">+12.5%</span>
                            </div>
                        </div>
                        <h3 class="mb-3">70</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">Open Tickets</span>
                            </div>
                            <div>
                                <span class="text-danger">-2.8%</span>
                            </div>
                        </div>
                        <h3 class="mb-3">100</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">Pending Tickets</span>
                            </div>
                            <div>
                                <span class="text-danger">-75%</span>
                            </div>
                        </div>
                        <h3 class="mb-3">125</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row filter-row">
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating">
                <label class="focus-label">Employee Name</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus select-focus">
                <select class="select floating">
                    <option> -- Select -- </option>
                    <option> Pending </option>
                    <option> Approved </option>
                    <option> Returned </option>
                </select>
                <label class="focus-label">Status</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus select-focus">
                <select class="select floating">
                    <option> -- Select -- </option>
                    <option> High </option>
                    <option> Low </option>
                    <option> Medium </option>
                </select>
                <label class="focus-label">Priority</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <div class="cal-icon">
                    <input class="form-control floating datetimepicker" type="text">
                </div>
                <label class="focus-label">From</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <div class="cal-icon">
                    <input class="form-control floating datetimepicker" type="text">
                </div>
                <label class="focus-label">To</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <a href="#" class="btn btn-success w-100"> Search </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ticket ID</th>
                            <th>Ticket Title</th>
                            <th>Ticket Client</th>
                            <th>Created Date</th>
                            <th class="text-center">Priority</th>
                            <th class="text-center">Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('dashboard.tickets.show', ['slug' => $ticket->slug]) }}">#TKT-00{{ $ticket->id }}</a></td>
                            <td>{{ $ticket->title }}</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a class="avatar avatar-xs" href="{{ route('dashboard.clients.profile', ['slug' => $ticket->client->slug]) }}">
                                        <img alt="{{ $ticket->client->full_name }}" src="{{ $ticket->client->profile_pic_url }}">
                                    </a>
                                    <a href="{{ route('dashboard.clients.profile', ['slug' => $ticket->client->slug]) }}">
                                        {{ $ticket->client->full_name }}
                                    </a>
                                </h2>
                            </td>
                            <td>{{ $ticket->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="dropdown action-label">
                                    <a class="btn btn-white btn-sm btn-rounded" href="#" aria-expanded="false">
                                        @if($ticket->priority == 'high')
                                            <i class="fa fa-dot-circle-o text-danger"></i> High
                                        @elseif($ticket->priority == 'medium')
                                            <i class="fa fa-dot-circle-o text-warning"></i> Medium
                                        @else
                                            <i class="fa fa-dot-circle-o text-success"></i> Low
                                        @endif
                                    </a>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="dropdown action-label">
                                    <a class="btn btn-white btn-sm btn-rounded" href="#" aria-expanded="false">
                                        @if($ticket->status == 'open')
                                            <i class="fa fa-dot-circle-o text-info"></i> Open
                                        @elseif($ticket->status == 'reopened')
                                            <i class="fa fa-dot-circle-o text-warning"></i> Re-Opened
                                        @elseif($ticket->status == 'solved')
                                            <i class="fa fa-dot-circle-o text-success"></i> Solved
                                        @elseif($ticket->status == 'pending')
                                            <i class="fa fa-dot-circle-o text-danger"></i> Pending
                                        @endif
                                    </a>
                                </div>
                            </td>
                            <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="{{ '#edit_ticket_' . $ticket->id }}">
                                            <i class="fa fa-pencil m-r-5"></i>Edit
                                        </a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="{{ '#delete_ticket_' . $ticket->id }}">
                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Ticket Modal -->
                        <div id="{{ 'edit_ticket_' . $ticket->id }}" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Ticket</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('dashboard.tickets.update', $ticket->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Ticket Title</label>
                                                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ $ticket->title }}">
                                                        @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Assign Client</label>
                                                        <select class="select @error('client') is-invalid @enderror" name="client">
                                                            @foreach(\App\Models\User::where('role', 'client')->get() as $client)
                                                                <option value="{{ $client->id }}" {{ $ticket->client_id == $client->id ? 'selected' : '' }}>{{ $client->full_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('client')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Priority</label>
                                                        <select class="select @error('priority') is-invalid @enderror" name="priority">
                                                            <option value="high" {{ $ticket->priority == 'high' ? 'selected' : '' }}>High</option>
                                                            <option value="medium" {{ $ticket->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                                            <option value="low" {{ $ticket->priority == 'low' ? 'selected' : '' }}>Low</option>
                                                        </select>
                                                        @error('priority')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="select @error('status') is-invalid @enderror" name="status">
                                                            <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                                                            <option value="reopened" {{ $ticket->status == 'reopened' ? 'selected' : '' }}>Re-opened</option>
                                                            <option value="solved" {{ $ticket->status == 'solved' ? 'selected' : '' }}>Solved</option>
                                                            <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        </select>
                                                        @error('status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ $ticket->description }}</textarea>
                                                        @error('description')
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
                        <!-- /Edit Ticket Modal -->

                        <!-- Delete Ticket Modal -->
                        <div id="{{ 'delete_ticket_' . $ticket->id }}" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="form-header">
                                            <h3>Delete Ticket</h3>
                                            <p>Are you sure want to delete?</p>
                                        </div>
                                        <div class="modal-btn delete-action">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn" onclick="event.preventDefault(); document.getElementById('{{ 'delete-ticket-form-' . $ticket->id }}').submit();">Delete</a>
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

                        <form class="d-none" id="{{ 'delete-ticket-form-' . $ticket->id }}" action="{{ route('dashboard.tickets.destroy', $ticket->id) }}" method="POST">
                            @csrf
                        </form>
                        <!-- /Delete Ticket Modal -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div id="add_ticket" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Ticket</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.tickets.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ticket Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Assign Client</label>
                                <select class="select @error('client') is-invalid @enderror" name="client">
                                    <!-- if query string has value of add-ticket set to a client ID, then select that client -->
                                    @foreach(\App\Models\User::where('role', 'client')->get() as $client)
                                        <option value="{{ $client->id }}" {{ request()->query('add-ticket') == $client->id ? 'selected' : '' }}>{{ $client->full_name }}</option>
                                    @endforeach
                                </select>
                                @error('client')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Priority</label>
                                <select class="select @error('priority') is-invalid @enderror" name="priority">
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                                @error('priority')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
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
<script>
    $(document).ready(function() {
        // if query string is present and has a value of 'add-ticket'
        if (window.location.search.indexOf('add-ticket') > -1) {
            $('#add_ticket').modal('show');
        }
    });
</script>
@endsection
