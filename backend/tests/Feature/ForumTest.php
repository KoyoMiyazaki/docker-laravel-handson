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
        $response = $this->get('/forum');
        $response->assertStatus(200);
    }

    public function testForumStoreTest()
    {
        $totalPosts = DB::table('forums')->count();
        $nextPostId = $totalPosts + 1;
        $testTitle = 'Test1';

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/forum', ['title' => $testTitle]);
        $response->assertStatus(302);
        $response->assertLocation("/forum/post/${nextPostId}");
        $response->assertRedirect("/forum/post/${nextPostId}");
        $response->assertSee("タイトル: ${testTitle}");
    }

    public function testForumEditTest()
    {
        $response = $this->get(route('forum.edit', 1));
        $response->assertOk();
    }

    public function testForumUpdateTest()
    {
        $lastPostId = DB::table('forums')->count();

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->put(route('forum.update', $lastPostId), ['title' => 'UpdatedTitle']);
        $response->assertStatus(302);
        $response->assertLocation("/forum");
        $response->assertRedirect("/forum");
    }

    public function testForumDestroyTest()
    {
        $lastPostId = DB::table('forums')->count();

        $response = $this->delete(route('forum.destroy', $lastPostId));
        $response->assertStatus(302);
        $response->assertLocation("/forum");
        $response->assertRedirect("/forum");
    }
}
