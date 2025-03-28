@extends('layouts.master')

@section('content')
    <body class="back">
        <div class="main">
            <h1 class="index_h1">{{ $article->Title }}</h1>

            <h5 class="date">
                <i>Posted on {{ \Carbon\Carbon::parse($article->StartDate)->format('F d, Y') }} 
                    by {{ $article->FirstName }} {{ $article->LastName }}</i>
            </h5>

            <div class="mainBody">{{ $article->Body }}</div>
        </div>
    </body>
@endsection
