<?php

namespace Database\Factories;

use App\Models\picture;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImgFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = picture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image_path' => $this->faker->image('storate/app/public/images', 750, 350, null, false)
        ];
    }
}
