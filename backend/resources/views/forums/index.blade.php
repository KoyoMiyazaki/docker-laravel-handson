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
        <form action="{{ route('forum.store') }}" method="post">
            @csrf
            <div class="form-group">
                <!-- <label for="content">入力欄</label> -->
                <textarea name="content" class="form-control" id="content" rows="2" required></textarea>
            </div>
            <button type="submit" class="btn btn-outline-info">登録</button>
        </form>

        <h2 class="mt-5">一覧</h2>
        <table class="table table-striped" style="table-layout:fixed;">
            <tbody>
                @foreach($forums as $forum)
                    <tr>
                        <td>{{$forum->id}}</td>
                        <td>{!! nl2br(e($forum->content)) !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $forums->links() }}
    </div>
</body>
</html>