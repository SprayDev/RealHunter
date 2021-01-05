<?php

namespace Database\Factories;

use App\Models\blog;
use App\Models\picture;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut dignissimos ducimus est hic, itaque, iure magni molestiae nisi perferendis possimus repudiandae, temporibus voluptatum! Itaque nisi officiis quod sed veritatis?Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut dignissimos ducimus est hic, itaque, iure magni molestiae nisi perferendis possimus repudiandae, temporibus voluptatum! Itaque nisi officiis quod sed veritatis?Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut dignissimos ducimus est hic, itaque, iure magni molestiae nisi perferendis possimus repudiandae, temporibus voluptatum! Itaque nisi officiis quod sed veritatis?Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut dignissimos ducimus est hic, itaque, iure magni molestiae nisi perferendis possimus repudiandae, temporibus voluptatum! Itaque nisi officiis quod sed veritatis? ',
            'picture_id' => function () {
                return picture::factory()->create()->id;
            },
            'views_number' => 0,
            'title' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut dignissimos ducimus est hic, itaque, iure magni molestiae nisi perferendis possimus repudiandae, temporibus voluptatum! Itaque nisi officiis quod sed veritatis?',
            'is_deleted' => 0
        ];
    }
}
