@extends('layouts.default')

@section('title', '店舗代表者作成ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection

@section('content')
<a class="logo" href="/admin/home">Rese</a>
<div class="container">
    <p class="title">Owner Create</p>
    <form class="form" action="/admin/register" method="post">
        @csrf
        <div class="name">
            <i class="fas fa-user"></i>
            <input type="text" name="name" placeholder="Ownername" value="{{old('name')}}">
            @error('name')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
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
            <button>登録</button>
        </div>
    </form>
</div>
@endsection