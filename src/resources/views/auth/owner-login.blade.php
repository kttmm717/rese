@extends('layouts.default')

@section('title', '店舗代表者ログインページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection

@section('content')
<a class="logo" href="/home">Rese</a>
<div class="container">
    <p class="title">Owner Login</p>
    <form class="form" action="/owner/login" method="post">
        @csrf
        <div class="email">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" placeholder="Email" value="{{old('email')}}">
            @error('email')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="password">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password">
            @error('password')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="button">
            <button>ログイン</button>
        </div>
    </form>
</div>
@endsection