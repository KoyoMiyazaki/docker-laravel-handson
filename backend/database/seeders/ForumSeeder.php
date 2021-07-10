<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $forumTitles = [
            'Test1',
            'Test2',
            'てすと１',
            'てすと２',
        ];

        foreach($forumTitles as $forumTitle)
        {
            DB::table('forums')->insert([
                'title' => $forumTitle,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }

        $posts = [
            'Hello world!',
            'Test Posts',
            'こんにちは',
            'てすとです。',
        ];

        for($i = 1, $iSize = count($forumTitles); $i <= $iSize; $i++)
        {
            for($j = 0, $jSize = count($posts); $j < $jSize; $j++)
            DB::table('forum_posts')->insert([
                'content' => $posts[$j],
                'forum_id' => $i,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
