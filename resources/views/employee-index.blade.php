@extends('layouts.app')

@section('content')
<?php
    $today_logs = \App\Models\Log::whereDate('created_at', Carbon\Carbon::today())->latest()->limit(10)->get();
    $previous_logs = \App\Models\Log::whereDate('created_at', '!=', Carbon\Carbon::today())->latest()->limit(10)->get();

    $total_tickets = \App\Models\Ticket::count();
    $solved_tickets = \App\Models\Ticket::where('status', 'solved')->count();
    $pending_tickets = \App\Models\Ticket::where('status', '!=', 'solved')->count();

    $new_clients = \App\Models\User::where('role', 'client')->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count();
    $total_clients = \App\Models\User::where('role', 'client')->count();
?>

<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="welcome-box">
                <div class="welcome-img">
                    <img alt="" src="{{ Auth::user()->profile_pic_url }}" />
                </div>
                <div class="welcome-det">
                    <h3>Welcome, {{ Auth::user()->full_name }}</h3>
                    <p>{{ date('l, F d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <section class="dash-section">
                <h1 class="dash-sec-title">Today</h1>
                <div class="dash-sec-content">
                    @if(count($today_logs) > 0)
                    @foreach($today_logs as $log)
                    <div class="dash-info-list">
                        <a href="#" class="dash-card text-{{ $log->type }}">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="{{ $log->icon }}"></i>
                                </div>
                                <div class="dash-card-content">
                                    <p>{{ $log->message }}</p>
                                </div>
                                <div class="dash-card-avatars">
                                    <div class="e-avatar"><img src="{{ $log->image }}" alt=""></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @else
                    <div class="dash-info-list">
                        <a href="#" class="dash-card text-info">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-info-circle"></i>
                                </div>
                                <div class="dash-card-content">
                                    <p>No logs for today</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                </div>
            </section>

            <section class="dash-section">
                <h1 class="dash-sec-title">Previous Logs</h1>
                @if(count($previous_logs) > 0)
                <div class="dash-sec-content">
                    @foreach($today_logs as $log)
                    <div class="dash-info-list">
                        <a href="#" class="dash-card text-{{ $log->type }}">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="{{ $log->icon }}"></i>
                                </div>
                                <div class="dash-card-content">
                                    <p>{{ $log->message }}</p>
                                </div>
                                <div class="dash-card-avatars">
                                    <div class="e-avatar"><img src="{{ $log->image }}" alt=""></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                    <div class="dash-info-list">
                        <a href="#" class="dash-card text-info">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-info-circle"></i>
                                </div>
                                <div class="dash-card-content">
                                    <p>No logs for previous days</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </section>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="dash-sidebar">
                <section>
                    <h5 class="dash-title">Tickets</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="time-list">
                                <div class="dash-stats-list">
                                    <h4>{{ $solved_tickets }}</h4>
                                    <p>Solved</p>
                                </div>
                                <div class="dash-stats-list">
                                    <h4>{{ $pending_tickets }}</h4>
                                    <p>Pending</p>
                                </div>
                            </div>
                            <div class="request-btn">
                                <div class="dash-stats-list">
                                    <h4>{{ $total_tickets }}</h4>
                                    <p>Total</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <h5 class="dash-title">Clients</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="time-list">
                                <div class="dash-stats-list">
                                    <h4>{{ $new_clients }}</h4>
                                    <p>New</p>
                                </div>
                                <div class="dash-stats-list">
                                    <h4>{{ $total_clients }}</h4>
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="request-btn">
                                <a class="btn btn-primary" href="{{ route('dashboard.clients') }}">View</a>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- <section>
                    <h5 class="dash-title">Your time off allowance</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="time-list">
                                <div class="dash-stats-list">
                                    <h4>5.0 Hours</h4>
                                    <p>Approved</p>
                                </div>
                                <div class="dash-stats-list">
                                    <h4>15 Hours</h4>
                                    <p>Remaining</p>
                                </div>
                            </div>
                            <div class="request-btn">
                                <a class="btn btn-primary" href="#">Apply Time Off</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <h5 class="dash-title">Upcoming Holiday</h5>
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="holiday-title mb-0">Mon 20 May 2019 - Ramzan</h4>
                        </div>
                    </div>
                </section> --}}
            </div>
        </div>
    </div>
</div>
@endsection
