<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SupportType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SupportTypeTest extends TestCase
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
    public function it_gets_support_types_list(): void
    {
        $supportTypes = SupportType::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.support-types.index'));

        $response->assertOk()->assertSee($supportTypes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_support_type(): void
    {
        $data = SupportType::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.support-types.store'), $data);

        $this->assertDatabaseHas('support_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_support_type(): void
    {
        $supportType = SupportType::factory()->create();

        $data = [
            'name' => $this->faker->name(),
        ];

        $response = $this->putJson(
            route('api.support-types.update', $supportType),
            $data
        );

        $data['id'] = $supportType->id;

        $this->assertDatabaseHas('support_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_support_type(): void
    {
        $supportType = SupportType::factory()->create();

        $response = $this->deleteJson(
            route('api.support-types.destroy', $supportType)
        );

        $this->assertModelMissing($supportType);

        $response->assertNoContent();
    }
}
