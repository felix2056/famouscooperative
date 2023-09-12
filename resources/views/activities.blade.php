@extends('layouts.app')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Activities</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Activities</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="activity">
                <div class="activity-box">
                    @if(count($logs) > 0)
                    <ul class="activity-list">
                        @foreach($logs as $log)
                        <li>
                            <div class="activity-user">
                                <a href="#" title="Lesley Grauer" data-bs-toggle="tooltip" class="avatar">
                                    <img src="{{ $log->image }}" alt="">
                                </a>
                            </div>
                            <div class="activity-content">
                                <div class="timeline-content">
                                    {{ $log->message }}
                                    <span class="time">{{ $log->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <ul class="activity-list">
                        <li>
                            <div class="activity-content text-center">
                                <div class="timeline-content">
                                    No activity so far
                                    <span class="time">Just Now</span>
                                </div>
                            </div>
                        </li>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
