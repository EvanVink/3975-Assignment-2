@extends('layouts.master')

@section('title', 'Home')

@section('content')

    @if (!session('userName'))
        <h1 class="landing_h1">THE BLOG</h1>

        <div class="landing_btn_container">
            <a href="{{ url('/login') }}" class="btn btn-secondary landing_login_btn">Login</a>
            <a href="{{ url('/register') }}" class="btn btn-secondary landing_signup_btn">Sign-up</a>
        </div>

    @else
        <div class="articles-container">
            <h1 class="mainText">Articles</h1>
            <div class="articles-grid">
                @foreach ($articles as $article)
                    @php
                        $dateStart = \Carbon\Carbon::parse($article->StartDate)->format('F d, Y');
                        $dateEnd = \Carbon\Carbon::parse($article->EndDate)->format('F d, Y');
                        $currentDate = now()->format('F d, Y');
                    @endphp

                    @if ($currentDate >= $dateStart && $currentDate <= $dateEnd)
                        <div class="card border-secondary mb-3 article-card">
                            <h5 class="card-header">{{ $article->Title }}</h5>
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->FirstName }} {{ $article->LastName }} - {{ $dateStart }}</h5>
                                <p class="card-text cardText">
                                    {{ Str::limit($article->Body, 100) }}... 
                                    <a href="{{ url('/article', $article->ArticleId) }}" class="cardButton">Read More</a>
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

@endsection