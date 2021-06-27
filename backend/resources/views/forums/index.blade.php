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
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="container mt-3">
        <h1>
            <a href="{{ route('forum.index') }}">掲示板アプリ</a>
        </h1>
        <h2 class="mt-5">新規掲示板作成</h2>
        <form action="{{ route('forum.store') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control" id="title" placeholder="タイトルを入力">
                <!-- <textarea name="title" class="form-control" id="title" rows="1" required></textarea> -->
            </div>
            <button type="submit" class="btn btn-outline-info">掲示板を作成</button>
        </form>

        <h2 class="mt-5">掲示板一覧</h2>
        <table class="table table-striped" style="table-layout:fixed;">
            <thead>
                <tr>
                    <th style="width: 65%">タイトル</th>
                    <th style="width: 25%">更新日</th>
                    <th style="width: 10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($forums as $forum)
                <tr>
                    <td>
                        <a href="{{ route('forum.post.index', $forum->id) }}">{!! nl2br(e($forum->title)) !!}</a>
                    </td>
                    <td>{{$forum->updated_at}}</td>
                    <td>
                        <form action="{{ route('forum.destroy', $forum->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $forums->links() }}
    </div>
</body>
</html>