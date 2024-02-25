<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Support;

use App\Models\Exporter;
use App\Models\SupportType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SupportTest extends TestCase
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
    public function it_gets_supports_list(): void
    {
        $supports = Support::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.supports.index'));

        $response->assertOk()->assertSee($supports[0]->description);
    }

    /**
     * @test
     */
    public function it_stores_the_support(): void
    {
        $data = Support::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.supports.store'), $data);

        $this->assertDatabaseHas('supports', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_support(): void
    {
        $support = Support::factory()->create();

        $supportType = SupportType::factory()->create();
        $exporter = Exporter::factory()->create();

        $data = [
            'description' => $this->faker->sentence(15),
            'support_type_id' => $supportType->id,
            'exporter_id' => $exporter->id,
        ];

        $response = $this->putJson(
            route('api.supports.update', $support),
            $data
        );

        $data['id'] = $support->id;

        $this->assertDatabaseHas('supports', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_support(): void
    {
        $support = Support::factory()->create();

        $response = $this->deleteJson(route('api.supports.destroy', $support));

        $this->assertModelMissing($support);

        $response->assertNoContent();
    }
}
