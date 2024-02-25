<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Support;

use App\Models\Exporter;
use App\Models\SupportType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SupportControllerTest extends TestCase
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
    public function it_displays_index_view_with_supports(): void
    {
        $supports = Support::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('supports.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.supports.index')
            ->assertViewHas('supports');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_support(): void
    {
        $response = $this->get(route('supports.create'));

        $response->assertOk()->assertViewIs('app.supports.create');
    }

    /**
     * @test
     */
    public function it_stores_the_support(): void
    {
        $data = Support::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('supports.store'), $data);

        $this->assertDatabaseHas('supports', $data);

        $support = Support::latest('id')->first();

        $response->assertRedirect(route('supports.edit', $support));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_support(): void
    {
        $support = Support::factory()->create();

        $response = $this->get(route('supports.show', $support));

        $response
            ->assertOk()
            ->assertViewIs('app.supports.show')
            ->assertViewHas('support');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_support(): void
    {
        $support = Support::factory()->create();

        $response = $this->get(route('supports.edit', $support));

        $response
            ->assertOk()
            ->assertViewIs('app.supports.edit')
            ->assertViewHas('support');
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

        $response = $this->put(route('supports.update', $support), $data);

        $data['id'] = $support->id;

        $this->assertDatabaseHas('supports', $data);

        $response->assertRedirect(route('supports.edit', $support));
    }

    /**
     * @test
     */
    public function it_deletes_the_support(): void
    {
        $support = Support::factory()->create();

        $response = $this->delete(route('supports.destroy', $support));

        $response->assertRedirect(route('supports.index'));

        $this->assertModelMissing($support);
    }
}
