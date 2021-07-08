<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Forum;
use App\Models\ForumPost;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = DB::table('forums')->orderBy('updated_at', 'desc')->paginate(5);
        $ids = DB::table('forums')->pluck('id')->toArray();

        $numOfPosts = [];
        foreach($ids as $id) {
            $count = DB::table('forum_posts')->where('forum_id', $id)->count();
            $numOfPosts[$id] = $count;
        }

        return view('forums.index')->with([
            'forums' => $forums,
            'numOfPosts' => $numOfPosts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forum = new Forum();
        $forum->title = $request->title;
        $forum->save(); 

        // var_dump($request->id);

        // return view('forums.posts.index', [
        //     'id' => $forum->id
        // ]);

        return redirect()->route('forum.post.index', ['id' => $forum->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forum = Forum::find($id);

        return view('forums.edit')->with('forum', $forum);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $forum = Forum::find($id);
        $forum->title = $request->title;
        $forum->save();

        return redirect('/forum')->with('message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forum = Forum::find($id);
        $forum->delete();

        return redirect('/forum')->with('message', '削除しました');
    }
}
