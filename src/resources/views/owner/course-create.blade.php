@extends('layouts.default')

@section('title', 'コース作成ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/owner-course-create.css')}}">
@endsection

@section('content')
<div class="container">
    <a class="logo" href="/owner/home">Rese</a>
    <div class="course">
        <form class="form" action="/course/create" method="post" enctype="multipart/form-data">
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

            <div class="item">
                <div class="item__name">コース説明</div>
                <textarea name="description"></textarea>
                @error('description')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="item">
                <div class="item__name">画像</div>
                @error('image')
                <p class="error">{{$message}}</p>
                @enderror
                <div class="image__preview"></div>
                <label>
                    画像を選択する
                    <input class="image__input" id="input-file" type="file" name="image">
                </label>
            </div>

            <div class="btn">
                <button>コースを作成する</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('input-file').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.querySelector('.image__preview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}">`;
            };

            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = "";
        }
    });
</script>
@endsection