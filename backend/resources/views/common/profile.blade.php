@extends('layouts.master')

@section('content')
    {{-- @if(!session('userName'))
        <script>
            window.location.href = '{{ route("401") }}'; // Redirect to 401 page if user is not logged in
        </script>
    @endif --}}

    <div class="page-wrapper">
        <div class="content-wrapper">
            <div class="headerContainer">
                <h1 class="mainProfile">My Account</h1>
                <h2 class="subheader">Dashboard</h2>
            </div>

            <div class="profile_container">
                <table class="profileTable">
                    <thead>
                        <tr>
                            <th>Article ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            @php
                                $dateStart = \Carbon\Carbon::parse($article->StartDate)->format('F d, Y');
                                $dateEnd = \Carbon\Carbon::parse($article->EndDate)->format('F d, Y');
                                $title = Str::limit($article->Title, 15);
                                $body = Str::limit(strip_tags($article->Body), 30);
                            @endphp
                            <tr>
                                <td>{{ $article->ArticleId }}</td>
                                <td>{{ $dateStart }}</td>
                                <td>{{ $dateEnd }}</td>
                                <td>{{ $title }}</td>
                                <td>{{ $body }}...</td>
                                <td>
                                    <button class="btn btn-outline-primary" type="button">
                                        <a class="link-button-edit dashboard-link" href="{{ route('edit.article', ['id' => $article->ArticleId]) }}">Edit</a>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-outline-danger" type="button">
                                        <a class="link-button-delete dashboard-link" href="{{ route('remove.article', ['id' => $article->ArticleId]) }}">Delete</a>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-outline-warning" type="button">
                                        <a class="link-button-view dashboard-link" href="{{ route('show.article', ['id' => $article->ArticleId]) }}">View</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
