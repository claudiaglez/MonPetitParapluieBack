<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            // Obtener todos los nombres de categorías existentes
            $existingCategories = Category::pluck('category')->toArray();

            // Seleccionar aleatoriamente uno de los nombres de categoría existentes
            $randomCategoryName = $this->faker->randomElement($existingCategories);
    
            return [
                'category' => $randomCategoryName,
            ];
    }
}
