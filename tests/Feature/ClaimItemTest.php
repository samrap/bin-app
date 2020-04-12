<?php

namespace Tests\Feature;

use App\Item;
use Tests\TestCase;
use App\Mail\ItemClaimed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClaimItemTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function claiming_an_item_redirects_with_success()
    {
        $item = factory(Item::class)->create();
        $identity = 'jackdrips@example.com';

        $response = $this->post("/bin/item/{$item->id}/claim", compact('identity'));

        $response
            ->assertRedirect("/bin/item/{$item->id}/claim-successful")
            ->assertSessionHas('identity', $identity);
    }

    /** @test */
    public function claiming_an_item_updates_the_item()
    {
        $item = factory(Item::class)->create();
        $identity = 'jackdrips@example.com';

        $this->assertFalse($item->hasBeenClaimed());

        $response = $this->post("/bin/item/{$item->id}/claim", compact('identity'));

        $updatedItem = $item->fresh();
        $this->assertTrue($updatedItem->hasBeenClaimed());
        $this->assertTrue($updatedItem->hasBeenClaimedBy($identity));
    }

    /** @test */
    public function claiming_an_item_sends_email_confirmation()
    {
        $item = factory(Item::class)->create();
        $identity = 'jackdrips@example.com';

        $response = $this->post("/bin/item/{$item->id}/claim", compact('identity'));

        Mail::assertQueued(ItemClaimed::class, function ($mail) use ($item, $identity) {
            return $mail->hasTo($identity) && $mail->item->id === $item->id;
        });
    }

    /** @test */
    public function cannot_double_claim_an_item()
    {
        $item = factory(Item::class)->states('claimed')->create();
        $identity = 'jackdrips@example.com';

        $response = $this->post("/bin/item/{$item->id}/claim", compact('identity'));
        $response
            ->assertRedirect("/bin/item/{$item->id}/claim-failed")
            ->assertSessionHas('identity', $item->claimed_by);
    }

    /** @test */
    public function view_success_page()
    {
        $item = factory(Item::class)->create();
        $identity = 'jackdrips@example.com';

        $response = $this
            ->withSession(compact('identity'))
            ->get("/bin/item/{$item->id}/claim-successful");

        $response
            ->assertOk()
            ->assertViewIs('items.claim-successful')
            ->assertViewHas('item', $item);
    }
}
