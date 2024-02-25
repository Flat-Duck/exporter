<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Support;
use App\Models\Exporter;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExporterSupportsTest extends TestCase
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
    public function it_gets_exporter_supports(): void
    {
        $exporter = Exporter::factory()->create();
        $supports = Support::factory()
            ->count(2)
            ->create([
                'exporter_id' => $exporter->id,
            ]);

        $response = $this->getJson(
            route('api.exporters.supports.index', $exporter)
        );

        $response->assertOk()->assertSee($supports[0]->description);
    }

    /**
     * @test
     */
    public function it_stores_the_exporter_supports(): void
    {
        $exporter = Exporter::factory()->create();
        $data = Support::factory()
            ->make([
                'exporter_id' => $exporter->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.exporters.supports.store', $exporter),
            $data
        );

        $this->assertDatabaseHas('supports', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $support = Support::latest('id')->first();

        $this->assertEquals($exporter->id, $support->exporter_id);
    }
}
