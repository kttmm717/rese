<!DOCTYPE html>
<html lang="en">
<head>
    <title>予約リマインド</title>
</head>
<body>
    <p>{{$reservation->user->name}} 様</p>
    <p>本日はご予約の日です。</p>

    <h3>予約情報</h3>
    <ul>
        <li><strong>店舗名：</strong> {{$reservation->store->name}}</li>
        <li><strong>日時：</strong> {{$reservation->reservation_time}}</li>
        <li><strong>人数：</strong> {{$reservation->number_of_people}}名</li>
    </ul>

    <p>ご来店を心よりお待ちしております。</p>
</body>
</html>