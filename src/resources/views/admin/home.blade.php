@extends('layouts.default')

@section('title', '管理者ホーム')

@section('css')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('content')
<div class="container">
    <form action="/logout" method="post">
        @csrf
        <button>Logout</button>
    </form>
</div>
@endsection