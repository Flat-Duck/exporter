<?php

namespace Database\Factories;

use App\Models\Support;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Support::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(15),
            'support_type_id' => \App\Models\SupportType::factory(),
            'exporter_id' => \App\Models\Exporter::factory(),
        ];
    }
}
