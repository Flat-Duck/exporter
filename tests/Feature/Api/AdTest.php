<?php

namespace Tests\Feature\Api;

use App\Models\Ad;
use App\Models\User;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdTest extends TestCase
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
    public function it_gets_ads_list(): void
    {
        $ads = Ad::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.ads.index'));

        $response->assertOk()->assertSee($ads[0]->body);
    }

    /**
     * @test
     */
    public function it_stores_the_ad(): void
    {
        $data = Ad::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.ads.store'), $data);

        $this->assertDatabaseHas('ads', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_ad(): void
    {
        $ad = Ad::factory()->create();

        $data = [
            'body' => $this->faker->text(),
        ];

        $response = $this->putJson(route('api.ads.update', $ad), $data);

        $data['id'] = $ad->id;

        $this->assertDatabaseHas('ads', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_ad(): void
    {
        $ad = Ad::factory()->create();

        $response = $this->deleteJson(route('api.ads.destroy', $ad));

        $this->assertModelMissing($ad);

        $response->assertNoContent();
    }
}
