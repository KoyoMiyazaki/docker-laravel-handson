@extends('layouts.app')

@section('title', '記事の作成')

@section('content')
<div class="content">
    <form method="post">
        @csrf
        <label>タイトル：<input id="title" type="text" name="title" value=""></label>
        <label>本文：<input id="content" type="text" name="content" value=""></label>
        <input type="submit" name="submit" value="投稿する">
    </form>
</div>

@endsection