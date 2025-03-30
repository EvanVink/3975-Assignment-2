@extends('layouts.master')

@section('content')

{{-- This page is an entry page with logo, article button, login button, sign-up button --}}

@if(Auth::check())
    <div class="landing-container">
        <h1 class="landing_h1">THE BLOG</h1>
        
        <div class="landing_btn_container">
            <a href="{{ route('articles') }}" class="btn btn-secondary landing_articles_btn">Articles</a>
            <a href="{{ route('articles') }}" class="btn btn-secondary landing_login_btn">Login</a>
            <a href="{{ route('articles') }}" class="btn btn-secondary landing_signup_btn">Sign-up</a>
        </div>
    </div>
@elseif(!Auth::check())
    <div class="landing-container">
        <h1 class="landing_h1">THE BLOG</h1>
        
        <div class="landing_btn_container">
            <a href="{{ route('articles') }}" class="btn btn-secondary landing_articles_btn">Articles</a>
            <a href="{{ route('login') }}" class="btn btn-secondary landing_login_btn">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary landing_signup_btn">Sign-up</a>
        </div>
    </div>

@endif

@endsection