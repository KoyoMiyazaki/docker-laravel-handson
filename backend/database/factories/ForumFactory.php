<?php

namespace Database\Factories;

use App\Models\Forum;
use Illuminate\Database\Eloquent\Factories\Factory;
use DateTime;

class ForumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Forum::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(5, true),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
    }
}
