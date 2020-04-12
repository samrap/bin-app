<?php

namespace Tests\Feature;

use App\Item;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_items()
    {
        factory(Item::class, 12)->create();

        $response = $this->get('/bin');

        $response
            ->assertOk()
            ->assertViewHas('items', Item::all());
    }

    /** @test */
    public function view_an_item()
    {
        $item = factory(Item::class)->create();

        $response = $this->get('/bin/'.$item->id);

        $response
            ->assertOk()
            ->assertViewHas('item', $item);
    }
}
