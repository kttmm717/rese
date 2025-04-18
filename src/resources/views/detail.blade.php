@extends('layouts.default')

@section('title', $reservation ?? false ? '予約編集ページ' : '飲食店詳細ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="top">
        <div class="left">
            <a class="logo" href="/home">Rese</a>
            <div class="store__name">
                @if(isset($reservation))
                <a class="back__link" href="/mypage"><</a>
                @else
                <a class="back__link" href="/"><</a>
                @endif
                <p>{{$store->name}}</p>
            </div>
            <div class="img">
                <img src="{{\Storage::url($store->image_path)}}">
            </div>
            <div class="hash">
                <p>#{{$store->area->name}}</p>
                <p>#{{$store->genre->name}}</p>
            </div>
            <p>{{$store->description}}</p>
            <a href="/review/store/{{$store->id}}" class="review__btn">このお店のレビューをみる</a>
        </div>

        <div class="right">
            <form class="form" action="{{$reservation ?? false ? url('change/'.$reservation->id) : url('/stripe/'.$store->id)}}" method="post">
                @csrf
                <p class="rese__title">{{$reservation ?? false ? '予約編集' : '予約'}}</p>
                <input type="hidden" name="id" value="{{$store->id}}">
                <input id="date-input" type="date" name="reservation_date" value="{{$reservation ?? false ? $reservation->reservation_date->format('Y-m-d') : ''}}">
                @error('reservation_date')
                <p class="error">{{$message}}</p>
                @enderror
                <div class="time__select">
                    <select id="time-select" name="reservation_time" data-reservation-time="{{isset($reservation) ? $reservation->reservation_time->format('H:i') : ''}}">
                        <option value="">時間を選択してください</option>
                    </select>
                </div>
                @error('reservation_time')
                <p class="error">{{$message}}</p>
                @enderror
                <div class="number__select">
                    <select id="number-select" name="number_of_people" data-reservation-number="{{isset($reservation) ? $reservation->number_of_people.'人' : ''}}">
                        <option value="">人数を選択してください</option>
                    </select>
                </div>
                @error('number_of_people')
                <p class="error">{{$message}}</p>
                @enderror
                <div class="course__select">
                    <select id="course__select" name="course_id">
                        <option value="">コースを選択してください</option>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}" {{isset($reservation) && $reservation->course_id == $course->id ? 'selected' : ''}}>{{$course->name}} {{$course->price}}円</option>
                        @endforeach
                    </select>
                </div>
                @error('course_id')
                <p class="error">{{$message}}</p>
                @enderror
                <table>
                    <tr>
                        <th>Shop</th>
                        <td>{{$store->name}}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td id="date-preview"></td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td id="time-preview"></td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td id="number-preview"></td>
                    </tr>
                    <tr>
                        <th>Course</th>
                        <td id="course-preview"></td>
                    </tr>
                </table>
                @if(isset($reservation))
                <div class="button">
                    <button>予約を変更する</button>
                </div>
                @elseif(auth()->check())
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
    <div class="cources">
        @if($courses->isEmpty())
        <p>現在このお店のコースは設定されていません</p>
        @else
        <p class="cource__title">コース一覧</p>
        @foreach($courses as $course)
        <div class="cource">
            <p class="cource__name">{{$course->name}}</p>
            <p class="cource__description">{{$course->description}}</p>
            <div class="cource__img">
                <img src="{{\Storage::url($course->image_path)}}">
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const timeSelect = document.getElementById('time-select');
        const reservedTime = timeSelect.dataset.reservationTime.trim();

        for (let hour = 10; hour <= 24; hour++) {
            for (let min of ['00', '30']) {
                if (hour === 24 && min === '30') break;
                const time = `${hour}:${min}`;
                const option = new Option(time, time);

                if (time === reservedTime) {
                    option.selected = true;
                }

                timeSelect.appendChild(option);
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const numberSelect = document.getElementById('number-select');
        const reservedNumber = numberSelect.dataset.reservationNumber.trim();

        for (let i = 1; i <= 50; i++) {
            const number = `${i}人`;
            const option = new Option(number, i);

            if (number === reservedNumber) {
                option.selected = true;
            }

            numberSelect.appendChild(option);
        }
    });


    document.getElementById("date-input").addEventListener("input", function() {
        document.getElementById("date-preview").textContent = this.value;
    });

    document.getElementById("time-select").addEventListener("change", function() {
        document.getElementById("time-preview").textContent = this.value;
    });

    document.getElementById("number-select").addEventListener("change", function() {
        document.getElementById("number-preview").textContent = this.value ? this.value + "人" : "";
    });

    document.getElementById("course__select").addEventListener("change", function() {
        const selectedOption = this.options[this.selectedIndex];
        document.getElementById("course-preview").textContent = selectedOption.textContent;
    });
</script>
@endsection