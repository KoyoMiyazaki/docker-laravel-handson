@extends('layouts.app')

@section('title', 'laravel日記')

@section('content')
    <p>
        投稿番号:{{$article->id}} /<b>{{$article->title}}</b><br>
        {{$article->content}}<br>
        投稿日:{{$article->created_at}}<br>
        <a href="/article/edit/{{$article->id}}">編集する</a>
        <a href="/article/destroy/{{$article->id}}">削除する</a>
    </p>
@endsection