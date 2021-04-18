@extends('layouts.app')

@section('title', 'laravel日記')

@section('content')
    <div class="link"><a href="/article/create">新規投稿</a></div>
    <div class="content">投稿内容</div>
    @foreach($articles as $article)
        <p>
            投稿番号:{{$article->id}} /<b>{{$article->title}}</b><br>
            {{$article->content}}<br>
            投稿日:{{$article->created_at}}
            <a href="/article/{{$article->id}}">確認する</a>
        </p>
    @endforeach
@endsection