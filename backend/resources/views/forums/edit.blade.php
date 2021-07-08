<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板アプリ | 編集</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container mt-3">
        <div class="mb-2">
            <h1><a href="{{ route('forum.index') }}">掲示板アプリ</a></h1>
        </div>
        <h2 class="mt-5">掲示板"{{$forum->title}}"のタイトル変更</h2>
        <form action="{{ route('forum.update', $forum->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" name="title" class="form-control" id="title" value="{{$forum->title}}" required>
            </div>
            <button type="submit" id="create-button" class="btn btn-outline-info">タイトルを変更</button>
        </form>

    </div>
</body>
</html>