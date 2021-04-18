<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PostController extends Controller
{
    //
    public function create(Request $request)
    {
        $article = new Article();
        
        $article->title = $request->title;
        $article->content = $request->content;

        $article->save();
        return redirect('/article');
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        $article->title = $request->input('title');
        $article->content = $request->input('content');

        $article->save();

        return redirect('/article');
    }

    public function delete(Request $request, $id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/article');
    }
}
