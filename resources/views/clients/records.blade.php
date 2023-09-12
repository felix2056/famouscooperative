@extends('layouts.app')

@section('title')
Reports
@endsection

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Reports</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.clients') }}">Clients</a></li>
                    <li class="breadcrumb-item active">Records</li>
                </ul>
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_ticket"><i class="fa fa-plus"></i> Add Record</a>
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

    <form action="{{ route('dashboard.clients.records', ['slug' => $client->slug]) }}" method="GET">
        @csrf
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus select-focus">
                    <select name="month" class="select floating">
                        <option> -- Select -- </option>
                        <option value="01" {{ $month == '01' ? 'selected' : '' }}>January</option>
                        <option value="02" {{ $month == '02' ? 'selected' : '' }}>February</option>
                        <option value="03" {{ $month == '03' ? 'selected' : '' }}>March</option>
                        <option value="04" {{ $month == '04' ? 'selected' : '' }}>April</option>
                        <option value="05" {{ $month == '05' ? 'selected' : '' }}>May</option>
                        <option value="06" {{ $month == '06' ? 'selected' : '' }}>June</option>
                        <option value="07" {{ $month == '07' ? 'selected' : '' }}>July</option>
                        <option value="08" {{ $month == '08' ? 'selected' : '' }}>August</option>
                        <option value="09" {{ $month == '09' ? 'selected' : '' }}>September</option>
                        <option value="10" {{ $month == '10' ? 'selected' : '' }}>October</option>
                        <option value="11" {{ $month == '11' ? 'selected' : '' }}>November</option>
                        <option value="12" {{ $month == '12' ? 'selected' : '' }}>December</option>
                    </select>
                    <label class="focus-label">Month</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus select-focus">
                    <select name="year" id="year" class="select floating">
                        <option> -- Select -- </option>
                    </select>
                    <label class="focus-label">Year</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <button type="submit" class="btn btn-success w-100"> Search </button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable-advanced">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Record ID</th>
                            <th>Record Amount</th>
                            <th>Record Date</th>
                            <th>Assigned Staff</th>
                            <th class="text-center">Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                
                                @if(!empty($record->id))
                                    <td>#RCD-00{{ $record->id }}</td>
                                @else
                                    <td></td>
                                @endif

                                @if(!empty($record->amount))
                                    <td>₦ {{ $record->amount }}</td>
                                @else
                                    <td></td>
                                @endif

                                @if(!empty($record->date))
                                    <td>{{ $record->date->format('d M Y') }}</td>
                                @else
                                    <td></td>
                                @endif

                                @if(!empty($record->employee))
                                    <td>
                                        <h2 class="table-avatar">
                                            <a class="avatar avatar-xs" href="profile.html">
                                                <img alt="" src="{{ $record->employee->profile_pic_url }}">
                                            </a>
                                            <a href="#">
                                                {{ $record->employee->full_name }}
                                            </a>
                                        </h2>
                                    </td>
                                @else
                                    <td></td>
                                @endif

                                @if(!empty($record->status))
                                <td class="text-center">
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm btn-rounded" href="#" aria-expanded="false">
                                            @if($record->status == 'pending')<i class="fa fa-dot-circle-o text-info"></i> Pending @endif
                                            @if($record->status == 'approved')<i class="fa fa-dot-circle-o text-success"></i> Approved @endif
                                            @if($record->status == 'disapproved')<i class="fa fa-dot-circle-o text-danger"></i> Disapproved @endif
                                        </a>
                                    </div>
                                </td>
                                @else
                                    <td></td>
                                @endif


                                <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="{{ '#edit_record_' . $loop->iteration }}"><i class="fa fa-pencil m-r-5"></i>Edit</a>
                                            @if(!empty($record->id))
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_ticket"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Edit Records Modal -->
                            <div id="{{ 'edit_record_' . $loop->iteration }}" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Record</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('dashboard.clients.records.update', ['slug' => $client->slug]) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="record_id" value="{{ $record->id ?? 0 }}">
                                                
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Amount</label>
                                                            <!-- input group -->
                                                            <div class="input-group">
                                                                <span class="input-group-text">₦</span>
                                                                <input class="form-control @error('amount') is-invalid @enderror" type="number" name="amount" value="{{ $record->amount ?? 0 }}" min="0" required>
                                                            </div>
                                                            @error('amount')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Date</label>
                                                            <input class="form-control @error('date') is-invalid @enderror" type="date" name="date" value="{{ $record->date->format('Y-m-d') }}" required readonly>
                                                            @error('date')
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
                            <!-- /Edit Records Modal -->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th>₦ {{ $total }}</th>
                        </tr>
                        <tr>
                            <th>Overall Total</th>
                            <th>₦ {{ $client->records->sum('amount') }}</th>
                        </tr>
                    </tfoot>
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
                    <span aria-hidden="true">�</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ticket Subject</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ticket Id</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Assign Staff</label>
                                <select class="select">
                                    <option>-</option>
                                    <option>Mike Litorus</option>
                                    <option>John Smith</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Client</label>
                                <select class="select">
                                    <option>-</option>
                                    <option>Delta Infotech</option>
                                    <option>International Software Inc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Priority</label>
                                <select class="select">
                                    <option>High</option>
                                    <option>Medium</option>
                                    <option>Low</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CC</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Assign</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ticket Assignee</label>
                                <div class="project-members">
                                    <a title="John Smith" data-placement="top" data-bs-toggle="tooltip" href="#" class="avatar">
                                        <img src="images/avatar-02.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Add Followers</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ticket Followers</label>
                                <div class="project-members">
                                    <a title="Richard Miles" data-bs-toggle="tooltip" href="#" class="avatar">
                                        <img src="images/avatar-09.jpg" alt="">
                                    </a>
                                    <a title="John Smith" data-bs-toggle="tooltip" href="#" class="avatar">
                                        <img src="images/avatar-10.jpg" alt="">
                                    </a>
                                    <a title="Mike Litorus" data-bs-toggle="tooltip" href="#" class="avatar">
                                        <img src="images/avatar-05.jpg" alt="">
                                    </a>
                                    <a title="Wilmer Deluna" data-bs-toggle="tooltip" href="#" class="avatar">
                                        <img src="images/avatar-11.jpg" alt="">
                                    </a>
                                    <span class="all-team">+2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Files</label>
                                <input class="form-control" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal custom-modal fade" id="delete_ticket" role="dialog">
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
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
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
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            var selected_year = {{ $year }};

            // fetch list of years for the dropdown
            var years = [];
            var currentYear = new Date().getFullYear();
            for (var i = 0; i < 10; i++) {
                years.push(currentYear - i);
            }

            $.each(years, function(key, value) {
                $('#year').append('<option value="' + value + '" ' + (value == selected_year ? 'selected' : '') + '>' + value + '</option>');
            });
        });
    </script>
@endsection