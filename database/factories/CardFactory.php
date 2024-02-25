<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->word(),
            'issued_at' => $this->faker->dateTime(),
            'expires_at' => $this->faker->dateTime(),
            'exporter_id' => \App\Models\Exporter::factory(),
        ];
    }
}
