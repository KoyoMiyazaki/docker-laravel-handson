<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板アプリ | {{ $forum->title }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    @isset($message)
    <div class="alert alert-success">{{ $message }}</div>
    @endisset
    
    <div class="container mt-3">
        <h1>
            <a href="{{ route('forum.index') }}">掲示板アプリ</a>
        </h1>
        <h2 class="mt-5">タイトル: {{ $forum->title }}</h2 class="mt-5">
        <h2 class="mt-5">新規投稿</h2>
        <form action="{{ route('forum.post.update', $forum->id) }}" method="post">
            @csrf
            <div class="form-group">
                <textarea name="content" class="form-control" id="content" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-outline-info">投稿する</button>
        </form>

        <h2 class="mt-5">投稿一覧</h2>
        <table class="table table-striped" style="table-layout:fixed;">
            <thead>
                <tr>
                    <th style="width: 90%">内容</th>
                    <th style="width: 10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <div class="d-flex justify-content-between mb-2">
                            <p>{{ $loop->index + 1 }}</p>
                            <p>投稿日時: {{ $post->created_at }}</p>
                        </div>
                        <p>{!! nl2br(e($post->content)) !!}</p>
                    </td>
                    <td>
                        <form action="{{ route('forum.post.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>