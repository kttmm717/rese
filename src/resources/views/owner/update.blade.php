@extends('layouts.default')

@section('title', '店舗編集ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/owner-create.css')}}">
@endsection

@section('content')
<div class="container">
    <a class="logo" href="/owner/home">Rese</a>
    <form class="form" action="/store/update" method="post" enctype="multipart/form-data">
        @csrf
        <h2>店舗情報編集</h2>
        @error('image_path')
        <p class="error">{{$message}}</p>
        @enderror
        <div class="image">
            <div class="image__preview"></div>
            <label>
                画像を選択する
                <input id="input-file" class="input__file" type="file" name="image" value="{{\Storage::url($store->image_path)}}">
            </label>
        </div>

        <div class="item">
            <p class="item__name">店舗名</p>
            <input class="item__name--input" type="text" name="name" value="{{$store->name}}">
            @error('name')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="item">
            <p class="item__name">エリア</p>
            <select name="area_id">
                @foreach($areas as $area)
                <option value="{{$area->id}}" {{$store->area_id == $area->id ? 'selected' : ''}}>
                    {{$area->name}}
                </option>
                @endforeach
            </select>
            @error('area')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="item">
            <p class="item__name">ジャンル</p>
            <select name="genre_id">
            @foreach($genres as $genre)
                <option value="{{$genre->id}}" {{$store->genre_id == $genre->id ? 'selected' : ''}}>
                    {{$genre->name}}
                </option>
            @endforeach
            </select>
            @error('genre')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="item">
            <p class="item__name">店舗説明</p>
            <textarea name="description">{{old('description', $store->description)}}</textarea>
            @error('description')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="btn">
            <button>店舗情報を更新する</button>
        </div>
    </form>
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