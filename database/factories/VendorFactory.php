<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pinCodes = ['700019','700033','700034','700040','700041','700047','700068','700071','700091'];
        $areas = [
            'Ballygunge','Tollygunge','Jadavpur','Behala','Kalighat','Lake Gardens',
            'Gariahat','Kasba','New Alipore','Rashbehari','Dhakuria'
        ];

        $area = fake()->randomElement($areas);
        $pin = fake()->randomElement($pinCodes);

        return [
            'user_id' => User::factory()->vendor(),
            'shop_name' => "{$area} Mart",
            'authorized_person' => fake()->name(),
            'pan_number' => strtoupper(fake()->bothify('?????#####?')),
            'shop_photo_url' => fake()->imageUrl(640,480,'shop',true,'Shop'),
            'address' => "{$area}, Kolkata, West Bengal - {$pin}",
            'latitude' => fake()->latitude(22.45,22.75),
            'longitude' => fake()->longitude(88.25,88.45),
            'market_area' => $area,
            'locality' => $area,
            'pin_code' => $pin,
            'district' => 'Kolkata',
            'city' => 'Kolkata',
            'state' => 'West Bengal',
            'office_code' => 'OFF' . fake()->unique()->numerify('###'),
            'delivery_radius_km' => fake()->randomFloat(1, 1, 3),
            'handling_charge_enabled' => fake()->boolean(40),
            'handling_charge' => fake()->randomFloat(2, 0, 25),
            'delivery_charge_enabled' => fake()->boolean(40),
            'delivery_charge' => fake()->randomFloat(2, 0, 30),
            'is_active' => true,
        ];
    }
}
