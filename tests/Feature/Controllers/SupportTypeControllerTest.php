<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\SupportType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SupportTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_support_types(): void
    {
        $supportTypes = SupportType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('support-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.support_types.index')
            ->assertViewHas('supportTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_support_type(): void
    {
        $response = $this->get(route('support-types.create'));

        $response->assertOk()->assertViewIs('app.support_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_support_type(): void
    {
        $data = SupportType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('support-types.store'), $data);

        $this->assertDatabaseHas('support_types', $data);

        $supportType = SupportType::latest('id')->first();

        $response->assertRedirect(route('support-types.edit', $supportType));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_support_type(): void
    {
        $supportType = SupportType::factory()->create();

        $response = $this->get(route('support-types.show', $supportType));

        $response
            ->assertOk()
            ->assertViewIs('app.support_types.show')
            ->assertViewHas('supportType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_support_type(): void
    {
        $supportType = SupportType::factory()->create();

        $response = $this->get(route('support-types.edit', $supportType));

        $response
            ->assertOk()
            ->assertViewIs('app.support_types.edit')
            ->assertViewHas('supportType');
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

        $response = $this->put(
            route('support-types.update', $supportType),
            $data
        );

        $data['id'] = $supportType->id;

        $this->assertDatabaseHas('support_types', $data);

        $response->assertRedirect(route('support-types.edit', $supportType));
    }

    /**
     * @test
     */
    public function it_deletes_the_support_type(): void
    {
        $supportType = SupportType::factory()->create();

        $response = $this->delete(route('support-types.destroy', $supportType));

        $response->assertRedirect(route('support-types.index'));

        $this->assertModelMissing($supportType);
    }
}
