@extends('layouts.default')

@section('title', 'QRコード')

@section('css')
<link rel="stylesheet" href="{{asset('css/qrcode.css')}}">
@endsection

@section('content')
<a class="logo" href="/home">Rese</a>
<div class="container">
    <p>来店時にこのQRコードを見せてください。</p>
    {!! QrCode::size(200)->generate(route('qr', ['id' => $reservation->id])) !!}
</div>
@endsection