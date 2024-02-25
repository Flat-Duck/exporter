<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Exporter;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExporterTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_exporters_list(): void
    {
        $exporters = Exporter::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.exporters.index'));

        $response->assertOk()->assertSee($exporters[0]->first_name);
    }

    /**
     * @test
     */
    public function it_stores_the_exporter(): void
    {
        $data = Exporter::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.exporters.store'), $data);

        $this->assertDatabaseHas('exporters', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_exporter(): void
    {
        $exporter = Exporter::factory()->create();

        $user = User::factory()->create();

        $data = [
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
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.exporters.update', $exporter),
            $data
        );

        $data['id'] = $exporter->id;

        $this->assertDatabaseHas('exporters', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_exporter(): void
    {
        $exporter = Exporter::factory()->create();

        $response = $this->deleteJson(
            route('api.exporters.destroy', $exporter)
        );

        $this->assertModelMissing($exporter);

        $response->assertNoContent();
    }
}
