@extends('layouts.default')

@section('title', 'サンクスページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/thanks.css')}}">
@endsection

@section('content')
<a class="logo" href="/home">Rese</a>
<div class="container">
    <p class="text">会員登録ありがとうございます</p>
    <a class="link" href="/login">ログインする</a>
</div>
@endsection