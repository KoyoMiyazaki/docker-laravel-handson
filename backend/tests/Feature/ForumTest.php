<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\Models\Forum;
use Illuminate\Support\Facades\DB;

class ForumTest extends TestCase
{
    use WithoutMiddleware;
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testForumIndexTest()
    {
        $request = $this->get('/forum');
        $request->assertStatus(200);
    }

    public function testForumStoreTest()
    {
        $totalPosts = DB::table('forums')->count();
        $nextPostId = $totalPosts + 1;
        $request = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/forum', ['title' => 'Test1']);
        $request->assertStatus(302);
        $request->assertRedirect("/forum/post/${nextPostId}");
    }

    public function testForumEditTest()
    {
        $request = $this->get(route('forum.edit', 1));
        $request->assertOk();
    }

    public function testForumUpdateTest()
    {
        $lastPostId = DB::table('forums')->count();

        $request = $this->withHeaders([
            'X-Header' => 'Value',
        ])->put(route('forum.update', $lastPostId), ['title' => 'UpdatedTitle']);
        $request->assertStatus(302);
        $request->assertRedirect("/forum");
    }

    public function testForumDestroyTest()
    {
        $lastPostId = DB::table('forums')->count();

        $request = $this->delete(route('forum.destroy', $lastPostId));
        $request->assertStatus(302);
        $request->assertRedirect("/forum");
    }
}
