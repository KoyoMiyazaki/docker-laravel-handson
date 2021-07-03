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
        <h2 class="mt-5">検索結果</h2>
        @if ($searchBy == 'title')
        <table class="table table-striped" style="table-layout:fixed;">
            <thead>
                <tr>
                    <th style="width: 75%">タイトル</th>
                    <th style="width: 25%">更新日</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                    <td class="forum-title">
                        <a href="{{ route('forum.post.index', $result->id) }}">{!! nl2br(e($result->title)) !!} ({{$numOfPosts[$result->id]}})</a>
                    </td>
                    <td>{{$result->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @elseif ($searchBy == 'content')
        <table class="table table-striped" style="table-layout:fixed;">
            <thead>
                <tr>
                    <th style="width: 50%">掲示板タイトル</th>
                    <th style="width: 50%">内容</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                    <td class="forum-title">
                        <a href="{{ route('forum.post.index', $result->forum_id) }}">{!! nl2br(e($titles[$result->forum_id])) !!}</a>
                    </td>
                    <td>{{$result->content}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>
</html>