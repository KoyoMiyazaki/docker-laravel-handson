<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class GetController extends Controller
{
    public function read()
    {
        $articles = Article::all();

        return view('index', ['articles' => $articles]);
    }

    public function show($id)
    {
        $article = Article::find($id);

        return view('show', ['article' => $article]);
    }

    public function edit($id)
    {
        $article = Article::find($id);

        return view('edit_article', ['article' => $article]);
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        return view('destroy_article', ['article' => $article]);
    }
}
