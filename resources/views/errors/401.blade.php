@extends('layouts.errors')

@section('content')
<div class="main-wrapper">
    <div class="error-box">
        <h1>401</h1>
        <h3><i class="fa fa-warning"></i> Oops! Unauthorized</h3>
        <p>You are not authorized to access this page.</p>
        <a href="/" class="btn btn-custom">Back to Dashboard</a>
    </div>
</div>
@endsection