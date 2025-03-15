@extends('layouts.default')

@section('title', 'QRコード読み込み完了')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<a class="logo" href="/home">Rese</a>
<div class="container">
    <p>QRコードを確認しました。</p>
</div>
@endsection