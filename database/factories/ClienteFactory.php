<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'edad' => $this->faker->randomNumber(2, true),
            'dni' => $this->faker->randomNumber(8, true),
            'correo' => $this->faker->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
            'usuario' => $this->faker->userName(),
            'contraseña' => $this->faker->password(6, 12),
        ];
    }
}
