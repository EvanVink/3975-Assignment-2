@extends('layouts.master')

@section('content')
<body>
    <div class="logo_container">
        <a href="{{ url('landing') }}">
            <img src="{{ asset('images/logo.jpg') }}" alt="Blog Logo" class="logo_img">
        </a>          
    </div>

    <h1 class="pending_h1">Waiting for approval!</h1>

    <div class="pending_container">
        <img src="{{ asset('images/approval.svg') }}" alt="Approval" class="approval_img">
    </div>

    <div class="pending_btn_container">
        <a href="{{ url('landing') }}" class="btn btn-secondary pending_main_btn">Main Page</a>
    </div>
</body>
@endsection
