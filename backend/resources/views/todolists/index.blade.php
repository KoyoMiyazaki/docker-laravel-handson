<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
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
        <h1>ToDoリスト</h1>
        <h2 class="mt-5">一覧へ追加</h2>
        <form action="{{ route('todolist.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="content">リストへ追加する内容を入力</label>
                <textarea name="content" class="form-control" id="content" rows="2"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-info">追加</button>
        </form>

        <h2 class="mt-5">一覧</h2>
        <table class="table table-striped" style="table-layout:fixed;">
            <tbody>
                @foreach($todolists as $todolist)
                    <tr>
                        <td>{{$todolist->content}}</td>
                        <td style="width:100px;">
                            <form action="{{ route('todolist.edit', $todolist->id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary">編集</button>
                            </form>
                        </td>
                        <td style="width:100px;">
                            <form action="{{ route('todolist.destroy', $todolist->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $todolists->links() }}
    </div>
</body>
</html>