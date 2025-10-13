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
    public function definition(): array
    {
        $brands = ['Tata','HUL','Britannia','Amul','ITC','Fortune','Patanjali'];
        $categories = ['Groceries','Dairy','Beverages','Snacks','Personal Care','Home Needs'];

        $brand = fake()->randomElement($brands);
        $category = fake()->randomElement($categories);

        return [
            'sku' => strtoupper(fake()->bothify('LS-###??')),
            'name' => "{$brand} " . fake()->word(),
            'brand_id' => null,
            'category_id' => null,
            'hsn_code' => fake()->numerify('####'),
            'uom' => fake()->randomElement(['kg','g','L','ml','pcs']),
            'mrp' => fake()->randomFloat(2, 20, 600),
            'gst_rate' => fake()->randomElement([5, 12, 18]),
            'default_image' => fake()->imageUrl(600,600,'product',true,$brand),
            'is_active' => true,
        ];
    }
}
