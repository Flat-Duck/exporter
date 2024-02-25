<?php

namespace Tests\Feature\Controllers;

use App\Models\Ad;
use App\Models\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_ads(): void
    {
        $ads = Ad::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('ads.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.ads.index')
            ->assertViewHas('ads');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_ad(): void
    {
        $response = $this->get(route('ads.create'));

        $response->assertOk()->assertViewIs('app.ads.create');
    }

    /**
     * @test
     */
    public function it_stores_the_ad(): void
    {
        $data = Ad::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('ads.store'), $data);

        $this->assertDatabaseHas('ads', $data);

        $ad = Ad::latest('id')->first();

        $response->assertRedirect(route('ads.edit', $ad));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_ad(): void
    {
        $ad = Ad::factory()->create();

        $response = $this->get(route('ads.show', $ad));

        $response
            ->assertOk()
            ->assertViewIs('app.ads.show')
            ->assertViewHas('ad');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_ad(): void
    {
        $ad = Ad::factory()->create();

        $response = $this->get(route('ads.edit', $ad));

        $response
            ->assertOk()
            ->assertViewIs('app.ads.edit')
            ->assertViewHas('ad');
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

        $response = $this->put(route('ads.update', $ad), $data);

        $data['id'] = $ad->id;

        $this->assertDatabaseHas('ads', $data);

        $response->assertRedirect(route('ads.edit', $ad));
    }

    /**
     * @test
     */
    public function it_deletes_the_ad(): void
    {
        $ad = Ad::factory()->create();

        $response = $this->delete(route('ads.destroy', $ad));

        $response->assertRedirect(route('ads.index'));

        $this->assertModelMissing($ad);
    }
}
