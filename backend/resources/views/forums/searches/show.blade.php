<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板アプリ | 検索画面</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="{{ asset('js/sample.js') }}"></script> -->
</head>
<body>
    <div class="container mt-3">
        <h1>
            <a href="{{ route('forum.index') }}">掲示板アプリ</a>
        </h1>
        <h2 class="mt-5">検索画面</h2>
        <p>{{$word}}</p>
    </div>
</body>
</html>