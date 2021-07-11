<?php

namespace Database\Factories;

use App\Models\ForumPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use DateTime;

class ForumPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ForumPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randMin = 1;
        $randMax = 10;
        return [
            'content' => $this->faker->paragraph(),
            'forum_id' => rand($randMin, $randMax),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
    }
}
