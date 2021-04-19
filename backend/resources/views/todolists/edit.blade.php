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
    <div class="container mt-3">
        <h1>ToDoリスト</h1>
        <form action="{{ route('todolist.update', $todolist->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="content">更新する内容を入力</label>
                <textarea name="content" class="form-control" id="content" rows="2">{{$todolist->content}}
                </textarea>
            </div>
            <button type="submit" class="btn btn-outline-info">更新</button>
        </form>
    </div>
</body>
</html>