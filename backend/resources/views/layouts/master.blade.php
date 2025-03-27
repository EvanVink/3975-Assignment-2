<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Blog</title>
</head>
<body>
    // uses laravels authentification to check if they are logged in, 
    // if they are: display the navbar
    @if(Auth::check()) 
    @include('layouts.navBar')
    @endif
    <div class="container">
        @yield('content')
        </div>
    @include('layouts.footer')
</body>
</html>