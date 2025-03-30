@extends('layouts.master')

@section('content')
    @php
        //Setting Vancouver timezone and current date
        date_default_timezone_set('America/Vancouver');
        $currentDate = date('Y-m-d');
    @endphp

    {{-- Display error messages if any --}}
    @if (!empty($error_messages))
        <div class="alert alert-danger createArticle_error_container">
            @foreach ($error_messages as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    {{-- Display the form only if the article exists and preloading article data!! --}}
    @if (isset($article))
        <div class="createArticle-form-container">
            <form method="POST" action="{{ route('articles.update', $article->ArticleId) }}">
                @csrf
                @method('PUT')
                <div class="email_date_container">
                    <div class="mb-31 flex-1">
                        <input type="hidden" name="Id" value="{{ $article->ArticleId }}">
                        <label for="email" class="form-label">Username</label>
                        <input type="text" class="form-control" id="email" 
                            value="{{ Auth::user()->Username }}" readonly>
                    </div>
                    <div class="mb-31 flex-1">
                        <label for="createDate" class="form-label">Create Date</label>
                        <input type="text" class="form-control" id="createDate"
                            value="{{ $article->CreateDate }}" readonly>
                    </div>
                </div>

                <div class="date-picker-row">
                    <div class="mb-31 flex-1">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" 
                            value="{{ $article->StartDate }}"
                            min="{{ $currentDate }}" required>
                    </div>
                    <div class="mb-31 flex-1">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" 
                            value="{{ $article->EndDate }}"
                            min="{{ $currentDate }}" required>
                    </div>
                </div>

                <div class="mb-31">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" 
                        value="{{ $article->Title }}" required>
                </div>

                <div class="mb-31">
                    <label for="body" class="form-label">Description</label>
                    <textarea class="form-control" id="body" name="body" rows="3" required>{{ $article->Body }}</textarea>
                </div>

                <div class="createArticle_btn_container">
                    <button type="submit" class="btn btn-secondary createArticle_btn">Update Article</button>
                </div>
            </form>
        </div>
    @endif
@endsection