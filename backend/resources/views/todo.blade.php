<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/todo.css')}}">
</head>
<body>
    <ul class="ul">
        <li>これからやること</li>
        @if(isset($runningItems))
        @foreach($runningItems as $runningItem)
            <li class="todo">{{htmlspecialchars($runningItem->title) ."   " .htmlspecialchars($runningItem->title)}}</li>
            <li>
                <form method='POST' action="/todo/update">
                @csrf
                <input type="hidden" value="{{$runningItem->id}}" name="id">
                <input type="hidden" value="{{$runningItem->flg}}" name="flg">
                <input type="submit" value="終了" class="todo_button">
                </form>
            </li>
        @endforeach
        @endif
    </ul>

    <ul class="ul">
        <li>もうやったこと</li>
        @if(isset($doneItems))
        @foreach($doneItems as $doneItem)
            <li class="todo">{{htmlspecialchars($doneItem->title) ."   " .htmlspecialchars($doneItem->title)}}</li>
            <li>
                <form method='POST' action="todo/delete">
                @csrf
                <input type="hidden" value="{{$doneItem->id}}" name="id">
                <input type="hidden" value="{{$doneItem->flg}}" name="flg">
                <input type="submit" value="削除" class="todo_button">
                </form>
            </li>
        @endforeach
        @endif
    </ul>

    <form method='POST' class="form" action="/todo" action="todo/create">
        @csrf
        <input type="text" placeholder="タイトルを入力してね" name="title" class="title">
        <textarea placeholder="内容を入力してね" name="content" class="content"></textarea>
        <input type="submit" value="追加" class="todo_button">
    </form>
</body>
</html>