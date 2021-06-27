<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Forum;
use App\Models\ForumPost;

class ForumPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $forum = Forum::find($id);
        $posts = DB::table('forum_posts')->where('forum_id', $id)->orderBy('updated_at', 'desc')->get();
        return view('forums.posts.index')->with([
            'forum' => $forum,
            'posts' => $posts,
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
        //
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
        //
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
        $forum_post = new ForumPost();
        $forum_post->content = $request->content;
        $forum_post->forum_id = $id;
        $forum_post->save();

        $forum = Forum::find($id);
        $posts = DB::table('forum_posts')->where('forum_id', $id)->orderBy('updated_at', 'desc')->get();
        return view('forums.posts.index')->with([
            'forum' => $forum,
            'posts' => $posts,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = ForumPost::find($id);
        $forum_id = $post->forum_id;
        $post->delete();

        // $forum = Forum::find($forum_id);
        // $posts = DB::table('forum_posts')->where('forum_id', $forum_id)->orderBy('updated_at', 'desc')->get();

        // return redirect()->route('forum.post.index', ['id' => $forum->id])->with([
        //     'forum' => $forum,
        //     'posts' => $posts,
        // ]);

        return redirect()->route('forum.post.index', ['id' => $forum_id]);
    }
}
