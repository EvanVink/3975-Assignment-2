@extends('layouts.master')

@section('content')
    <body class="back">
        <div class="articles-container">
            <h1 class="mainText">Articles</h1>
            <div class="articles-grid">
                @php
                    // Get the current date
                    $currentDate = now()->format('F d, Y');
                @endphp

                @foreach($articles as $article)
                    @php
                        // Format start and end dates
                        $dateStart = \Carbon\Carbon::parse($article->StartDate)->format('F d, Y');
                        $dateEnd = \Carbon\Carbon::parse($article->EndDate)->format('F d, Y');
                        $firstName = $article->FirstName;
                        $lastName = $article->LastName;
                    @endphp
                    {{-- @if($currentDate >= $dateStart && $currentDate <= $dateEnd) --}}
                    <div class='card border-secondary mb-3 article-card'>
                        <h5 class="card-header">{{ $article->Title }}</h5>
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $user->FirstName }} {{ $user->LastName }} - {{ $dateStart }}
                                </h5>
                                <p class="card-text cardText">
                                    {{ Str::limit($article->Body, 100) }}...
                                    <a href="{{ route('show.article', ['id' => $article->ArticleId]) }}" class="cardButton">
                                        Read More
                                    </a>
                                </p>
                            </div>
                        </div>
                        </div>
                    {{-- @endif --}}
                @endforeach
            </div>
    </body>
@endsection
