<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => $this->faker->sentence(),
            'body' => '"<h1>' . $this->faker->sentence() . '</h1><p>' . $this->faker->realText() . '</p>"',
            'thumbnail_id' => Image::factory(),
            'visible' => 1,
        ];
    }
}
