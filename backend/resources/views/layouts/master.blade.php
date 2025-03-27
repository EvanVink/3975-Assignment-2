<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="{{URL::to('css/styles.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Blog</title>
</head>
<body>
    
    <!-- if $showHeader is true, display header as well (Using in routes/web.php)-->
    @if ($showHeader ?? true)
        @include('layouts.header')
     @endif

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.footer')
</body>
</html>