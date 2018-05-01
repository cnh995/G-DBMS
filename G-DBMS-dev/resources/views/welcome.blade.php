<!-- resources/views/welcome.blade.php -->

@extends('layouts.app')

@section('styles')
<style>
    body {
        background-color:gray;
    }
</style>
@endsection

@section('content')
<div class="jumbotron">
    <h1>Welcome to Graduate DBMS!</h1>
    <h3>Department of Computer Science</h3>
    {{-- <img src="{{ asset('storage/csci_logo.png') }}" alt="Department of Computer Science, University of North Dakota" class="img-responsive" /> --}}
    <img src="{{ asset('und_banner.png') }}" alt="University of North Dakota" class="img-responsive" />
    <a href="{{ url('/login') }}" class="btn btn-lg">Click to Login</a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <img src="{{ asset('storage/flame.png') }}" alt="" class="img-responsive" />
        </div>
    </div>
</div>
@endsection
