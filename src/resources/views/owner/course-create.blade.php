@extends('layouts.default')

@section('title', 'コース作成ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/owner-course-create.css')}}">
@endsection

@section('content')
<div class="container">
    <a class="logo" href="/owner/home">Rese</a>
    <div class="course">
        <form class="form" action="/course/create" method="post">
            @csrf
            <h2>コース作成</h2>

            <div class="item">
                <div class="item__name">コース名</div>
                <input type="text" name="name">
                @error('name')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="item">
                <div class="item__name">価格</div>
                <div class="yen__wrapper">
                    <span class="yen">￥</span>
                    <input class="price__input" type="text" name="price">
                </div>
                @error('price')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="btn">
                <button>コースを作成する</button>
            </div>
        </form>
    </div>
</div>
@endsection