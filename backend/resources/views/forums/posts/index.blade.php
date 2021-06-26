<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container mt-3">
        <h1>掲示板アプリ</h1>
        <h2 class="mt-5">入力欄</h2>
        <p>id：{{$forum->id}}</p>
        <p>title：{{$forum->title}}</p>
    </div>
</body>
</html>