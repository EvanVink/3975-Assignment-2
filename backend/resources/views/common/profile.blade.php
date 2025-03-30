@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content-wrapper">
        <div class='headerContainer'>
            <h1 class='mainProfile'>My Account</h1>
            <h2 class='subheader'>Dashboard</h2>
        </div>
        
        <div class='profile_container'>
            <table class='profileTable'>
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
                            $dateStart = date_create($article->StartDate);
                            $dateStart = date_format($dateStart, "F d, Y");
                            $dateEnd = date_create($article->EndDate);
                            $dateEnd = date_format($dateEnd, "F d, Y");
                            $title = substr($article->Title, 0, 15);
                            $str = strip_tags(substr($article->Body, 0, 30));
                        @endphp
                        <tr>
                            <td>{{ $article->ArticleId }}</td>
                            <td>{{ $dateStart }}</td>
                            <td>{{ $dateEnd }}</td>
                            <td>{{ $title }}</td>
                            <td>{{ $str }}...</td>
                            <td>
                                <button class='btn btn-outline-primary' type='button'>
                                    <a class='link-button-edit dashboard-link' href="{{ route('edit.article', $article->ArticleId) }}">Edit</a>
                                </button>
                            </td>
                            <td>
                                <button class='btn btn-outline-danger' type='button'>
                                    <a class='link-button-delete dashboard-link' href="{{ route('remove.article', $article->ArticleId) }}">Delete</a>
                                </button>
                            </td>
                            <td>
                                <button class='btn btn-outline-warning' type='button'>
                                    <a class='link-button-view dashboard-link' href="{{ route('articles', $article->ArticleId) }}">View</a>
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