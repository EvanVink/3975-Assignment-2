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
                    <h1 class="font-semibold text-lg mb-4">You're logged in!</h1>

                    <h2 class="text-xl font-bold">Articles</h2>

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
                            @endphp
                            
                            {{-- @if($currentDate >= $dateStart && $currentDate <= $dateEnd) --}}
                                <div class='card border-secondary mb-3 article-card'>
                                    <h5 class="card-header">{{ $article->Title }}</h5>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $article->FirstName }} {{ $article->LastName }} - {{ $dateStart }}
                                        </h5>
                                        <p class="card-text">
                                            {{ Str::limit($article->Body, 100) }}...
                                            {{-- <a href="{{ route('show.article', ['id' => $article->ArticleId]) }}" class="cardButton"> --}}
                                                Read More
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            {{-- @endif --}}
                        @endforeach
                    </div>
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
