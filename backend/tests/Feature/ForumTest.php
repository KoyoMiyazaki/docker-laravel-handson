<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\Models\Forum;

class ForumTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;
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
        $request = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/forum', ['title' => 'Test1']);
        $request->assertStatus(302);
        $request->assertRedirect("/forum/post/1");
    }

    public function testForumEditTest()
    {
        $request = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/forum', ['title' => 'Test1']);

        // $response = $this->get("/forum/1/edit");
        $response = $this->get(route('forum.edit', 1));
        dd($response);
        // $response->dump();
        // $response->assertOk();

        // $response = $this->get('/forum');
        // $response->assertStatus(200);
    }
}
