<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Forum;
use App\Models\ForumPost;
use DateTime;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfForums = 10;
        Forum::factory()->count($numOfForums)->create();

        $numOfPosts = 100;
        ForumPost::factory()->count($numOfPosts)->create();

        // for($i = 1, $iSize = count($forumTitles); $i <= $iSize; $i++)
        // {
        //     for($j = 0, $jSize = count($posts); $j < $jSize; $j++)
        //     DB::table('forum_posts')->insert([
        //         'content' => $posts[$j],
        //         'forum_id' => $i,
        //         'created_at' => new DateTime(),
        //         'updated_at' => new DateTime(),
        //     ]);
        // }
    }
}
