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
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testForumGetTest()
    {
        $response = $this->get('/forum');
        $response->assertStatus(200);
    }

    public function testForumPostTest()
    {

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/forum', ['title' => 'Test']);
        $response->assertRedirect('/forum/post/14');
        
        // $newPost = Forum::where('title', 'This is Test')->first();
        // self::assertSame(
        //     'This is Test', $newPost->title,
        //     "Expected \"This is Test\" but {$newPost->title}."
        // );
    }
}
