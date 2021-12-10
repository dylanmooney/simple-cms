<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'path' => 'placeholder.jpg',
            'original_name' => $this->faker->text(),
            'file_size' => $this->faker->randomNumber(),
            'mime_type' => $this->faker->mimeType(),
            'alt_text' => $this->faker->realText(),
        ];
    }
}