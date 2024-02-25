<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Card;

use App\Models\Exporter;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CardTest extends TestCase
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
    public function it_gets_cards_list(): void
    {
        $cards = Card::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.cards.index'));

        $response->assertOk()->assertSee($cards[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_card(): void
    {
        $data = Card::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.cards.store'), $data);

        $this->assertDatabaseHas('cards', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_card(): void
    {
        $card = Card::factory()->create();

        $exporter = Exporter::factory()->create();

        $data = [
            'status' => $this->faker->word(),
            'issued_at' => $this->faker->dateTime(),
            'expires_at' => $this->faker->dateTime(),
            'exporter_id' => $exporter->id,
        ];

        $response = $this->putJson(route('api.cards.update', $card), $data);

        $data['id'] = $card->id;

        $this->assertDatabaseHas('cards', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_card(): void
    {
        $card = Card::factory()->create();

        $response = $this->deleteJson(route('api.cards.destroy', $card));

        $this->assertModelMissing($card);

        $response->assertNoContent();
    }
}
