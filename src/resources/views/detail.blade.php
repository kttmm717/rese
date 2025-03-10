@extends('layouts.default')

@section('title', '飲食店詳細ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="left">
        <a class="logo" href="/home">Rese</a>
        <div class="store__name">
            <a class="back__link" href="/"><</a>
            <p>{{$store->name}}</p>
        </div>
        <img src="{{asset($store->image_path)}}">
        <div class="hash">
            <p>#{{$store->area->name}}</p>
            <p>#{{$store->genre->name}}</p>
        </div>
        <p>{{$store->description}}</p>
    </div>

    <div class="right">
        <form class="form" action="/done" method="post">
            @csrf
            <p class="rese__title">予約</p>
            <input type="hidden" name="id" value="{{$store->id}}">
            <input type="date" name="reservation_date">
            <div class="time__select">
                <select name="reservation_time" id="time-select"></select>
            </div>
            <div class="number__select">
                <select name="number_of_people" id="number-select"></select>
            </div>
            <table>
                <tr>
                    <th>Shop</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Number</th>
                    <td></td>
                </tr>
            </table>
            @if(auth()->check())
            <div class="button">
                <button>予約する</button>
            </div>
            @else
            <div class="button disabled">
                <button disabled>予約する</button>
            </div>
            @endif            
            <p class="text">※ログインがお済みでない方はログインしてから予約をしてください</p>
        </form>
    </div>
</div>
<script>
    const timeSelect = document.getElementById('time-select');
    for(let hour=10; hour<=24; hour++) {
        for(let min of ['00', '30']) {
            if(hour === 24 && min === '30') break;
            const time = `${hour}:${min}`;
            const option = new Option(time, time);
            timeSelect.appendChild(option);
        }
    }
    timeSelect.value = "17:00";

    const numberSelect = document.getElementById('number-select');
    for(let i=1; i<=50; i++) {
        const number = `${i}人`;
        const option = new Option(number, i);
        numberSelect.appendChild(option);
    }
    numberSelect.value = 1;

</script>
@endsection