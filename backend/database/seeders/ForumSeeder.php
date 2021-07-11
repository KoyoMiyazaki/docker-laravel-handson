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
    }
}
