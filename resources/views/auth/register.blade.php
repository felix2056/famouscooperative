@extends('layouts.auth')

@section('title')
Register
@endsection

@section('content')
<div class="account-box">
    <div class="account-wrapper">
        <h3 class="account-title">Register</h3>
        <p class="account-subtitle">Access to our dashboard</p>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>First Name</label><span class="text-danger ms-1">*</span>
                
                <input type="text" placeholder="First Name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name">
                @if ($errors->has('first_name'))
                    <div class="text-danger pt-2">{{ $errors->first('first_name') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label>Last Name</label><span class="text-danger ms-1">*</span>
                
                <input type="text" placeholder="Last Name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name">
                @if ($errors->has('last_name'))
                    <div class="text-danger pt-2">{{ $errors->first('last_name') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label>Email</label><span class="text-danger ms-1">*</span>
                
                <input type="text" placeholder="Email" id="email_address" class="form-control @error('email') is-invalid @enderror" name="email">
                @if ($errors->has('email'))
                    <div class="text-danger pt-2">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="form-group Password-icon">
                <label>Password</label><span class="text-danger ms-1">*</span>
                
                <input type="password" placeholder="Password" id="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password"><span class="fa fa-eye-slash toggle-password pt-4"></span>
                @if ($errors->has('password'))
                    <div class="text-danger pt-2">{{ $errors->first('password') }}</div>
                @endif
            </div>

            @if(session()->has('message'))
                <div class="alert alert-danger mt-3" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="form-group text-center">
                <button class="btn btn-primary account-btn" type="submit">Register</button>
            </div>

            <div class="account-footer">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>

    </div>
</div>
@endsection
