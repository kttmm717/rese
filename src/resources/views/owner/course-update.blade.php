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
            <form class="form" action="/course/update/{{$course->id}}" method="post" enctype="multipart/form-data">
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
                
                <div class="item">
                    <div class="item__name">コース説明</div>
                    <textarea name="description">{{$course->description}}</textarea>
                </div>

                <div class="item">
                    <div class="item__name">画像</div>
                    <div class="image__preview">
                        <img src="{{ Storage::disk('s3')->url($course->image_path) }}">
                    </div>
                    <label>
                        画像を選択する
                        <input class="image__input" type="file" name="image">
                    </label>
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
<script>
    document.querySelectorAll('.image__input').forEach(input => {
    input.addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = this.closest('.item').querySelector('.image__preview');

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
});
</script>
@section('content')