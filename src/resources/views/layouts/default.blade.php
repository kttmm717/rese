<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@1.0.15/destyle.css">
    <link rel="stylesheet" href="{{asset('css/default.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    @yield('css')
</head>
<body>
@yield('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {//設定オブジェクト
            "closeButton": true,//trueにして通知メッセージに閉じるボタン表示
            "positionClass": "toast-bottom-right",//画面の右下に表示
        }

        @if(Session::has('flashSuccess'))
        //flashの付くセッション名は一度だけデータを格納するもので、次回リクエスト後に削除される
	        toastr.success("{{ session('flashSuccess') }}");
	        //セッションからflashSuccessキーに格納された値を取り出して成功メッセージとして表示
        @endif
    </script>
</body>
</html>