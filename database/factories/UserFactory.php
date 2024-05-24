<?php

namespace Database\Factories;

use App\Models\Program;
use App\Models\ClassGroup;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName,
            'firstname' => fake()->firstName,
            'lastname' => fake()->lastName,
            'othername' => fake()->lastName,
            'gender' => rand(1, 2) == 1 ? "m" : "f",
            'is_admin' => '0',
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    public function staff()
    {
        return $this->state(function (array $attributes) {
            return [
                // User attributes...
                'is_staff' => '1',

                // Staff specific attributes using StaffFactory
                // 'staff_attributes' => StaffFactory::new()->create()->getAttributes(),
            ];
        });
    }

    public function student(){
        return $this->state(function (array $attributes) {
            $classgroup = ClassGroup::all()->random();
            return [
                    'identity_number' => $this->faker->unique()->randomNumber(8),
                    'index_number' => $this->faker->unique()->randomNumber(8),
                    'class_group_id' => $classgroup->id,
                    'is_staff' => '0',

            ];
        });
}

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
