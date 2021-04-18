@extends('layouts.app')

@section('title', 'laravel日記')

@section('content')
    <p>
        投稿番号:{{$article->id}} /<b>{{$article->title}}</b><br>
        {{$article->content}}<br>
        投稿日:{{$article->created_at}}<br>
        <form method="post">
            @csrf
            <input type="submit" name="submit" value="削除する">
        </form>
        <a href="/article/{{$article->id}}">戻る</a>
    </p>
@endsection