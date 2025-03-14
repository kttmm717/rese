@extends('layouts.default')

@section('title', '店舗代表者ホーム')

@section('css')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('content')
<div class="container">
        <a href="/reservation">Rservation</a>
        <a href="/owner/notify">Email</a>
        <a href="/store/create">Store Create</a>
        <a href="/store/update">Store Updata</a>
        <form action="/logout" method="post">
            @csrf
            <button>Logout</button>
        </form>
</div>
@endsection