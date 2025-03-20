@extends('layouts.default')

@section('title', '予約情報確認ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/owner-index.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="top">
        <a class="logo" href="/owner/home">Rese</a>
        <div class="store__info">
            <p class="store__name">{{$store->name}}</p>
            <img src="{{Storage::disk('s3')->url($store->image_path}}">
        </div>
    </div>

    <div class="rese">
        <h2 class="rese__title">予約状況</h2>
        <form action="/reservation/search" method="get">
            <input class="date__search" type="date" name="reservation_date" value="{{request('reservation_date')}}">
            <input type="hidden" name="store_id" value="{{$store->id}}">
            <button class="search__btn">検索</button>
        </form>
    </div>

    @if(request('reservation_date'))
        <p class="day">{{\Carbon\Carbon::parse(request('reservation_date'))->format('Y/m/d')}}の予約</p>
        <div class="reservations">
            @if($searchReservations->isEmpty())
                <p>この日の予約はありません</p>
            @else
                @foreach($searchReservations as $reservation)
                    <table class="reservation">
                        <tr>
                            <th>予約者</th>
                            <td>{{$reservation->user->name}}</td>
                        </tr>
                        <tr>
                            <th>時間</th>
                            <td>{{$reservation->reservation_time->format('H:i')}}</td>
                        </tr>
                        <tr>
                            <th>人数</th>
                            <td>{{$reservation->number_of_people}}人</td>
                        </tr>
                        <tr>
                            <th>コース</th>
                            <td>{{$reservation->course->name}}</td>
                        </tr>
                    </table>
                @endforeach
            @endif
        </div>
    @else
        <p class="day">本日</p>
        <div class="reservations">
            @if($todayReservations->isEmpty())
                <p>本日の予約はありません</p>
            @else
                @foreach($todayReservations as $todayReservation)
                    <table class="reservation">
                        <tr>
                            <th>予約者</th>
                            <td>{{$todayReservation->user->name}}</td>
                        </tr>
                        <tr>
                            <th>時間</th>
                            <td>{{$todayReservation->reservation_time->format('H:i')}}</td>
                        </tr>
                        <tr>
                            <th>人数</th>
                            <td>{{$todayReservation->number_of_people}}人</td>
                        </tr>
                        <tr>
                            <th>コース</th>
                            <td>{{$todayReservation->course->name}}</td>
                        </tr>
                    </table>
                @endforeach
            @endif
        </div>
        <p class="day">明日</p>
        <div class="reservations">
            @if($tomorrowReservations->isEmpty())
                <p>明日の予約はありません</p>
            @else
                @foreach($tomorrowReservations as $tomorrowReservation)
                    <table class="reservation">
                        <tr>
                            <th>予約者</th>
                            <td>{{$tomorrowReservation->user->name}}</td>
                        </tr>
                        <tr>
                            <th>時間</th>
                            <td>{{$tomorrowReservation->reservation_time->format('H:i')}}</td>
                        </tr>
                        <tr>
                            <th>人数</th>
                            <td>{{$tomorrowReservation->number_of_people}}人</td>
                        </tr>
                        <tr>
                            <th>コース</th>
                            <td>{{$tomorrowReservation->course->name}}</td>
                        </tr>
                    </table>
                @endforeach
            @endif
        </div> 
    @endif
</div>
@endsection