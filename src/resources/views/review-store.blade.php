@extends('layouts.default')

@section('title', 'レビュー一覧ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/review-store.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="top">
        <a class="logo" href="/home">Rese</a>
        <div class="store__info">
            <p class="store__name">{{$store->name}}</p>
            <img src="{{Storage::disk('s3')->url($store->image_path)}}">
        </div>
    </div>

    <p class="review__title">レビュー一覧</p>

    @if($reviews->isEmpty())
        <p class="text">まだこのお店のレビューはありません</p>
    @else
        @foreach($reviews as $review)
            <div class="item">
                <div class="evaluation">
                    <div>
                        <span>評価</span>
                        <span>
                            @for($i=1; $i<=5; $i++)
                                <i class="fa-solid fa-star star {{$i<=$review->rating ? 'checked' : ''}}"></i>
                            @endfor
                        </span>
                    </div>
                    <p class="date">{{$review->created_at->format('Y/m/d')}}</p>
                </div>
                <p class="user__name">{{$review->user->name}} さん</p>
                <p>{{$review->comment}}</p>
            </div>
        @endforeach
    @endif
</div>
@endsection