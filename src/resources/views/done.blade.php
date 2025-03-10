@extends('layouts.default')

@section('title', '予約完了ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/done.css')}}">
@endsection

@section('content')
<a class="logo" href="/home">Rese</a>
<div class="container">
    <p class="text">ご予約ありがとうございます</p>
    <a class="link" href="/">戻る</a>
</div>
@endsection