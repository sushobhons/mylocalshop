<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('en_IN')->name(),
            'mobile' => fake()->unique()->numerify('9#########'),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'role' => 'customer',
            'is_active' => true,
        ];
    }

    /**
     * Indicate that the model's role should be vendor.
     *
     */
    public function vendor(): static
    {
        return $this->state(fn() => ['role' => 'vendor']);
    }

    /**
     *  Indicate that the model's role should be customer.
     *
     */
    public function customer(): static
    {
        return $this->state(fn() => ['role' => 'customer']);
    }
}
