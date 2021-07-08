<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板アプリ | トップ</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/event.js') }}"></script>
</head>
<body>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h1><a href="{{ route('forum.index') }}">掲示板アプリ</a></h1>
            <form action="{{ route('forum.search.show') }}" method="get" class="d-flex">
                <select class="form-select" name="searchBy">
                    <option value="title" selected>タイトル</option>
                    <option value="content">内容</option>
                </select>
                <div class="form-group align-middle mb-0">
                    <input type="text" name="word" class="form-control" id="word" placeholder="検索するワードを入力">
                </div>
                <button type="submit" class="btn btn-outline-info">検索</button>
            </form>
        </div>
        <h2 class="mt-5">新規掲示板作成</h2>
        <form action="{{ route('forum.store') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control" id="title" placeholder="タイトルを入力" required>
            </div>
            <button type="submit" id="create-button" class="btn btn-outline-info">掲示板を作成</button>
        </form>

        <h2 class="mt-5">掲示板一覧</h2>
        <table class="table table-striped" style="table-layout:fixed;">
            <thead>
                <tr>
                    <th style="width: 60%">タイトル</th>
                    <th style="width: 20%">更新日</th>
                    <th style="width: 10%"></th>
                    <th style="width: 10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($forums as $forum)
                <tr>
                    <td class="forum-title">
                        <a href="{{ route('forum.post.index', $forum->id) }}">{!! nl2br(e($forum->title)) !!} ({{$numOfPosts[$forum->id]}})</a>
                    </td>
                    <td>{{$forum->updated_at}}</td>
                    <td>
                        <form action="{{ route('forum.edit', $forum->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">編集</button>
                        </form>
                    </td>
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
    <!-- <script src="{{ asset('js/sample.js') }}"></script> -->
</body>
</html>