@extends('layouts.default')

@section('title', 'お知らせメール作成ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/notify.css')}}">
@endsection

@section('content')
<div class="container">
    <a class="logo" href="/owner/home">Rese</a>
    <h2>利用者にお知らせメールを送信</h2>

    <form class="form" action="/owner/notify" method="post">
        @csrf
        <p class="item">送信先ユーザー</p>
        @error('user')
        <p class="error">{{$message}}</p>
        @enderror
        <select name="user_id">
            <option value="">選択してください</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}} {{$user->email}}</option>
            @endforeach
        </select>

        <p class="item">お知らせ内容</p>
        @error('message')
        <p class="error">{{$message}}</p>
        @enderror
        <textarea name="message"></textarea>

        <div class="btn">
            <button>送信</button>
        </div>
    </form>
</div>
@endsection