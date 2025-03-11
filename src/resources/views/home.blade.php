@extends('layouts.default')

@section('title', 'ホーム')

@section('css')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('content')
<div class="container">
    @if(auth()->check())
        <a href="/">home</a>
        <form action="/logout" method="post">
            @csrf
            <button>Logout</button>
        </form>
        <a href="/mypage">Mypage</a>
    @else
        <a href="/">home</a>
        <a href="/register">Registration</a>
        <a href="/login">Login</a>
    @endif
</div>
@endsection