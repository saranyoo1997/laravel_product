<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $name=fake()->unique()->sentence(3),
            'slug' => str_replace(' ','_',$name),
            'price' =>fake()->randomFloat(2,0,1000),
            'category_id'=>fake()->numberBetween(1,10)
        ];
    }
}
