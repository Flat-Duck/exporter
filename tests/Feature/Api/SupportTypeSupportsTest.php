<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Support;
use App\Models\SupportType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SupportTypeSupportsTest extends TestCase
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
    public function it_gets_support_type_supports(): void
    {
        $supportType = SupportType::factory()->create();
        $supports = Support::factory()
            ->count(2)
            ->create([
                'support_type_id' => $supportType->id,
            ]);

        $response = $this->getJson(
            route('api.support-types.supports.index', $supportType)
        );

        $response->assertOk()->assertSee($supports[0]->description);
    }

    /**
     * @test
     */
    public function it_stores_the_support_type_supports(): void
    {
        $supportType = SupportType::factory()->create();
        $data = Support::factory()
            ->make([
                'support_type_id' => $supportType->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.support-types.supports.store', $supportType),
            $data
        );

        $this->assertDatabaseHas('supports', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $support = Support::latest('id')->first();

        $this->assertEquals($supportType->id, $support->support_type_id);
    }
}
