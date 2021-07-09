<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Forum;
use App\Models\ForumPost;

class ForumSearchController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->searchBy == 'title') {
            // 掲示板ごとの投稿数を配列として設定
            $ids = DB::table('forums')->pluck('id')->toArray();
            $numOfPosts = [];
            foreach($ids as $id) {
                $count = DB::table('forum_posts')->where('forum_id', $id)->count();
                $numOfPosts[$id] = $count;
            }

            $results = DB::table('forums')
                ->where('title', 'like', "%{$request->word}%")
                ->orderBy('updated_at', 'desc')
                ->get();
            return view('forums.searches.show')->with([
                'results' => $results,
                'searchBy' => 'title',
                'numOfPosts' => $numOfPosts,
            ]);
        } else if ($request->searchBy == 'content') {
            // 掲示板ごとのタイトルを配列として設定
            $titles = DB::table('forums')->pluck('title', 'id')->toArray();

            $results = DB::table('forum_posts')
                ->where('content', 'like', "%{$request->word}%")
                ->orderBy('updated_at', 'desc')
                ->get();
            return view('forums.searches.show')->with([
                'results' => $results,
                'searchBy' => 'content',
                'titles' => $titles,
            ]);
        }
    }
}
