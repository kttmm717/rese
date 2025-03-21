@extends('layouts.default')

@section('title', '新規会員登録ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection

@section('content')
<a class="logo" href="/home">Rese</a>
<div class="container">
    <p class="title">Registration</p>
    <form class="form" action="/register" method="post">
        @csrf
        <div class="name">
            <i class="fas fa-user icon"></i>
            <input type="text" name="name" placeholder="Username" value="{{old('name')}}">
            @error('name')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
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
            <button>登録</button>
        </div>
    </form>
</div>
@endsection