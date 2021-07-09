<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $posts = DB::table('forum_posts')->where('forum_id', $id)->get();
        return view('forums.posts.index')->with([
            'forum' => $forum,
            'posts' => $posts,
        ]);
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
        $forum->updated_at = Carbon::now();
        $forum->save();

        $posts = DB::table('forum_posts')->where('forum_id', $id)->get();
        return view('forums.posts.index')->with([
            'forum' => $forum,
            'posts' => $posts,
            'message' => '投稿しました',
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

        return redirect()->route('forum.post.index', ['id' => $forum_id]);
    }
}
