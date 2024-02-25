<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funko>
 */
class FunkoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'name' => $this->faker->word,
        'description' => $this->faker->sentence,
        'price' => $this->faker->randomFloat(2, 10, 100),
        'quantity' => $this->faker->numberBetween(1, 100),
        'img' => 'default_image.jpg', // Asigna la imagen por defecto o genera una aleatoria
        'category_id' => 1, // Aquí debes asignar el ID de la categoría si lo necesitas
        'isDeleted' => false,
    ];
}
}
