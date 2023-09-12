@extends('layouts.auth')

@section('title')
Login
@endsection

@section('content')
<div class="account-wrapper">
    <h3 class="account-title">Login</h3>
    <p class="account-subtitle">Access to our dashboard</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label>Email Address</label>
            <input type="text" placeholder="Email" id="email" class="form-control @error('email') is-invalid @enderror" name="email">
            @if ($errors->has('email'))
                <div class="text-danger pt-2">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="form-group Password-icon">
            <div class="row">
                <div class="col">
                    <label>Password</label>
                </div>
                <div class="col-auto">
                    <a class="text-muted" href="forgot-password.html">
                        Forgot password?
                    </a>
                </div>
            </div>
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
            <button class="btn btn-primary account-btn" type="submit">Login</button>
        </div>

        <div class="account-footer">
            <p>Don't have an account yet? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </form>

</div>
@endsection
