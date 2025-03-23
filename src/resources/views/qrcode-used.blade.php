@extends('layouts.default')

@section('title', 'QRコード読み込み完了')

@section('css')
<link rel="stylesheet" href="{{asset('css/qrcode.css')}}">
@endsection

@section('content')
<a class="logo" href="/home">Rese</a>
<div class="container">
    <table>
        <tr>
            <th>予約者名</th>
            <td>{{$reservation->user->name}}</td>
        </tr>
        <tr>
            <th>予約日</th>
            <td>{{$reservation->reservation_date->format('Y/m/d')}}</td>
        </tr>
        <tr>
            <th>予約時間</th>
            <td>{{$reservation->reservation_time->format('H:i')}}</td>
        </tr>
        <tr>
            <th>人数</th>
            <td>{{$reservation->number_of_people}}</td>
        </tr>
        <tr>
            <th>コース</th>
            <td>{{$reservation->course->name}}</td>
        </tr>
    </table>
    @if($reservation->is_visited === 0)
        <form action="/reservation/visited/{{$reservation->id}}" method="post">
            @csrf
            <button>来店確認する</button>
        </form>
    @else
        <p>来店済みです</p>
    @endif
</div>
@endsection