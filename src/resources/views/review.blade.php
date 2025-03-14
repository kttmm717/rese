@extends('layouts.default')

@section('title', 'レビュー')

@section('css')
<link rel="stylesheet" href="{{asset('css/review.css')}}">
@endsection
<div class="container">
    <div class="left">
        <a class="logo" href="/home">Rese</a>
        <div class="store__name">
            <a class="back__link" href="/mypage"><</a>
            <p>{{$store->name}}</p>
        </div>
        <img src="{{\Storage::url($store->image_path)}}">
        <div class="hash">
            <p>#{{$store->area->name}}</p>
            <p>#{{$store->genre->name}}</p>
        </div>
        <p>{{$store->description}}</p>
    </div>

    <div class="right">
        <form class="form" action="/review/create/{{$store->id}}" method="post">
            @csrf
            <p class="title">履歴</p>
            <table>
                <tr>
                    <th>Shop</th>
                    <td>{{$reservation->store->name}}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{$reservation->reservation_date->format('Y-m-d')}}</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>{{$reservation->reservation_time->format('H:i')}}</td>
                </tr>
                <tr>
                    <th>Number</th>
                    <td>{{$reservation->number_of_people}}人</td>
                </tr>
            </table>
            <p class="title">レビュー</p>
            <div class="review__area">
                <div id="star-rating" class="star__area">
                    @for($i=1; $i<=5; $i++)
                        <i class="fa-solid fa-star star" data-value="{{$i}}"></i>
                    @endfor
                </div>
                @error('rating')
                <p class="error">{{$message}}</p>
                @enderror
                <input type="hidden" name="rating" id="rating-input">
                <textarea name="comment" placeholder="レビュー本文"></textarea>
                @error('comment')
                <p class="error">{{$message}}</p>
                @enderror
                <div class="btn">
                    <button>レビューを投稿する</button>
                </div>
                <input type="hidden" name="reservation_id", value="{{$reservation->id}}">
            </div>
        </form>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll(".star");
    const ratingInput = document.getElementById("rating-input");

    stars.forEach(star => {
        star.addEventListener("click", function() {
            const rating = this.getAttribute("data-value");
            ratingInput.value = rating;

            stars.forEach(s => s.classList.remove("checked"));

            for(let i=0; i<rating; i++) {
                stars[i].classList.add("checked");
            }
        });
    });
});
</script>
@section('content')