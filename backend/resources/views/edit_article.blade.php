@extends('layouts.app')

@section('title', 'laravel日記')

@section('content')
    <div class="content">
        <form method="post">
            @csrf
            <label>タイトル：<input id="title" type="text" name="title" value="{{$article->title}}"></label>
            <label>本文：<input id="content" type="text" name="content" value="{{$article->content}}"></label>
            <input type="submit" name="submit" value="変更する">
        </form>
    </div>
@endsection