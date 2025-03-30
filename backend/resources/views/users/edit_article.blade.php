@extends('layouts.app')

@section('content')


    <div class="createArticle-form-container">
        <form method="POST" action="{{ route('article.update', ['id' => $articleId]) }}">
            @csrf
            <div class="email_date_container">
                <div class="mb-31 flex-1">
                    <input type="hidden" name="Id" value="{{ $queriedData->ArticleId }}">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" value="{{ Session::get('userName') }}" readonly>
                </div>
                <div class="mb-31 flex-1">
                    <label for="createDate" class="form-label">Create Date</label>
                    <input type="text" class="form-control" id="createDate" value="{{ $queriedData->CreateDate }}" readonly>
                </div>
            </div>

            <div class="date-picker-row">
                <div class="mb-31 flex-1">
                    <label for="startDate" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" value="{{ $queriedData->StartDate }}" min="{{ $currentDate }}" required>
                </div>
                <div class="mb-31 flex-1">
                    <label for="endDate" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="endDate" name="endDate" value="{{ $queriedData->EndDate }}" min="{{ $currentDate }}" required>
                </div>
            </div>

            <div class="mb-31">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $queriedData->Title }}" required>
            </div>

            <div class="mb-31">
                <label for="body" class="form-label">Description</label>
                <textarea class="form-control" id="body" name="body" rows="3" required>{{ $queriedData->Body }}</textarea>
            </div>

            <div class="createArticle_btn_container">
                <button type="submit" class="btn btn-secondary createArticle_btn">Update Article</button>
            </div>
        </form>
    </div>
@endsection
