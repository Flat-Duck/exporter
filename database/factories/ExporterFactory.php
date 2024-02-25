<?php

namespace Database\Factories;

use App\Models\Exporter;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExporterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exporter::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'nationality' => $this->faker->text(255),
            'gender' => \Arr::random(['male', 'female', 'other']),
            'license' => $this->faker->text(255),
            'commercial_book' => $this->faker->text(255),
            'commercial_room' => $this->faker->text(255),
            'block_time' => $this->faker->text(255),
            'block_reason' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
