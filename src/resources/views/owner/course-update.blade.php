@extends('layouts.default')

@section('title', 'コース編集ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/owner-course-create.css')}}">
@endsection
<div class="container">
    <a class="logo" href="/owner/home">Rese</a>
    @if(count($errors)>0)
    <ul class="error__ul">
        @foreach($errors->all() as $error)
        <li class="error">{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <div class="course">
    @if($courses->isEmpty())
        <p class="text">現在登録されているコースはありません</p>
    @else
        @foreach($courses as $course)
            <form class="form" action="/course/update/{{$course->id}}" method="post">
                @csrf

                <div class="item">
                    <div class="item__name">コース名</div>
                    <input type="text" name="name" value="{{$course->name}}">
                </div>

                <div class="item">
                    <div class="item__name">価格</div>
                    <div class="yen__wrapper">
                        <span class="yen">￥</span>
                        <input class="price__input" type="text" name="price" value="{{$course->price}}">
                    </div>
                </div>

                <div class="btn">
                    <button>コースを編集する</button>
                </div>
            </form>
            <form class="btn delete__btn" action="/course/delete/{{$course->id}}" method="post">
                @csrf
                @method('delete')
                <button>コースを削除する</button>
            </form>
        @endforeach
    @endif
    </div>
</div>
@section('content')