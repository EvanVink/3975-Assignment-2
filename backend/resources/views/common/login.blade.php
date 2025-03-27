@extends('layouts.master')

@section('content')
<div class="login-wrapper">
    <h1 class="login_h1">Welcome Back!</h1>

    @if ($errors->any())
        <div class="alert alert-danger login_error_container">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="login-form-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="login_btn_container">
                <button type="submit" class="btn btn-secondary login_login_btn">Submit</button>
                <span class="txt_space">or</span>
                <a href="{{ route('register') }}" class="btn btn-secondary login_signup_btn">Sign-up</a>
            </div>
        </form>
    </div>
</div>
@endsection
