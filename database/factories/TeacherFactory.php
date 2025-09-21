<?php

namespace Database\Factories;

use App\Enums\RolType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teachers>
 */
class TeacherFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get all cases as an array
        $cases = RolType::cases();

        // Get a random key from the cases array
        $randomKey = array_rand($cases);

        // Get the random enum case object
        $randomCase = $cases[$randomKey];

        return [
            'name' => fake()->name(),
            'last_name' => fake()->lastName(),
            'password' => static::$password ??= Hash::make('password'),
            'email' => fake()->unique()->safeEmail(),
            'grade' => '1104',
            'document' => fake()->numberBetween(1000000000, 1999999999),
            'document_type' => 'T.I',
            'rol' => $randomCase
        ];
    }
}
