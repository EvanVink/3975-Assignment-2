@extends('layouts.master')

@section('content')
<div class="error-container">
    <h1 class="error401_h1">401</h1>
    <h2 class="error401_h2">Unauthorized Access!</h2>
    <p class="error401_p">You must be logged in to access the page</p>
    
    <div class="error401_btn_container">
        <a href="{{ route('landing') }}" class="btn btn-secondary error401_btn">Login/Sign-up</a>
    </div>
</div>
@endsection