<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Exporter;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExporterControllerTest extends TestCase
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
    public function it_displays_index_view_with_exporters(): void
    {
        $exporters = Exporter::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('exporters.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.exporters.index')
            ->assertViewHas('exporters');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_exporter(): void
    {
        $response = $this->get(route('exporters.create'));

        $response->assertOk()->assertViewIs('app.exporters.create');
    }

    /**
     * @test
     */
    public function it_stores_the_exporter(): void
    {
        $data = Exporter::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('exporters.store'), $data);

        $this->assertDatabaseHas('exporters', $data);

        $exporter = Exporter::latest('id')->first();

        $response->assertRedirect(route('exporters.edit', $exporter));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_exporter(): void
    {
        $exporter = Exporter::factory()->create();

        $response = $this->get(route('exporters.show', $exporter));

        $response
            ->assertOk()
            ->assertViewIs('app.exporters.show')
            ->assertViewHas('exporter');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_exporter(): void
    {
        $exporter = Exporter::factory()->create();

        $response = $this->get(route('exporters.edit', $exporter));

        $response
            ->assertOk()
            ->assertViewIs('app.exporters.edit')
            ->assertViewHas('exporter');
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

        $response = $this->put(route('exporters.update', $exporter), $data);

        $data['id'] = $exporter->id;

        $this->assertDatabaseHas('exporters', $data);

        $response->assertRedirect(route('exporters.edit', $exporter));
    }

    /**
     * @test
     */
    public function it_deletes_the_exporter(): void
    {
        $exporter = Exporter::factory()->create();

        $response = $this->delete(route('exporters.destroy', $exporter));

        $response->assertRedirect(route('exporters.index'));

        $this->assertModelMissing($exporter);
    }
}
