@extends('layouts.master')


@section('content')
<div class="logo_container_login_signup">
    <a href="{{ url('/') }}">
        <img src="{{ asset('images/logo.jpg') }}" alt="Blog Logo" class="logo_img">
    </a>
</div>

<div class="signup_page_container">
    <h1 class="login_h1">Create an Account</h1>

    @if ($errors->any())
        <div class="alert alert-danger signup-form-container signup_error_container">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    
    <div class="signup-form-container">

        <form method="POST" action="{{ route('register') }}">

            @csrf
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required value="{{ old('firstName') }}">
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required value="{{ old('lastName') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <small class="text-muted">At least 8 characters with an uppercase, lowercase, number, and special character.</small>
            </div>
            
            <div class="signup_btn_container">
                <button type="submit" class="btn btn-secondary signup_create_btn">Create Account</button>
            </div>        
        </form>
    </div>
</div>
@endsection