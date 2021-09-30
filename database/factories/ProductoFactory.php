<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'precio' => $this->faker->randomNumber(2, true),
            'stock' => $this->faker->randomNumber(3, true),
            'descripcion' => $this->faker->sentence(),
            'imagen' => $this->faker->image('public/images', 640, 480, null, false)
        ];
    }
}
