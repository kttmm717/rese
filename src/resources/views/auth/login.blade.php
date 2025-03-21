@extends('layouts.default')

@section('title', 'ログインページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection

@section('content')
<a class="logo" href="/home">Rese</a>
<div class="container">
    <p class="title">Login</p>
    <form class="form" action="/login" method="post">
        @csrf
        <div class="email">
            <i class="fas fa-envelope icon"></i>
            <input type="text" name="email" placeholder="Email" value="{{old('email')}}">
            @error('email')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="password">
            <i class="fas fa-lock icon"></i>
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