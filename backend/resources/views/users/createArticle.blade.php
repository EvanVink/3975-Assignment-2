@extends('layouts.master')

@section('content')
<div class="createArticle-form-container">
    <h2 class="mb-4">Create New Article</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger createArticle_error_container">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    
    <form method="POST" action="{{ route('articles.store') }}">
        @csrf
        <div class="email_date_container">
            <div class="mb-31 flex-1">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" value="{{ Auth::user()->Username }}" readonly>
            </div>
            <div class="mb-31 flex-1">
                <label for="createDate" class="form-label">Create Date</label>
                <input type="text" class="form-control" id="createDate" value="{{ $currentDate }}" readonly>
            </div>
        </div>

        <div class="date-picker-row">
            <div class="mb-31 flex-1">
                <label for="startDate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate" min="{{ $currentDate }}" required>
            </div>
            <div class="mb-31 flex-1">
                <label for="endDate" class="form-label">End Date</label>
                <input type="date" class="form-control" id="endDate" name="endDate" min="{{ $currentDate }}" required>
            </div>
        </div>

        <div class="mb-31">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-31">
            <label for="body" class="form-label">Description</label>
            <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
        </div>

        <div class="createArticle_btn_container">
            <button type="submit" class="btn btn-secondary createArticle_btn">Create Article</button>
        </div>
    </form>
</div>