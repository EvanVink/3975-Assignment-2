@extends('layouts.master')

@section('content')
<div class="landing-container">
    <h1 class="landing_h1">THE BLOG</h1>
    
    <div class="landing_btn_container">
        <a href="{{ route('view.articles') }}" class="btn btn-primary landing_articles_btn">Articles</a>
        <a href="{{ route('login') }}" class="btn btn-secondary landing_login_btn">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary landing_signup_btn">Sign-up</a>
    </div>
</div>
@endsection