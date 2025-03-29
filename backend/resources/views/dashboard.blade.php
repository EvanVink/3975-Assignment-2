<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
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

</x-app-layout>
