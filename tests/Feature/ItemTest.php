<?php

namespace Tests\Feature;

use App\Item;
use App\Image;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_featured_image_url()
    {
        $image = factory(Image::class)->states('featured')->make();
        $item = factory(Item::class)->create();
        $item->images()->save($image);

        $this->assertEquals($image->url, $item->fresh()->featuredImageUrl());
    }
}
