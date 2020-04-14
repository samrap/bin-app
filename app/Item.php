<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $casts = ['price' => 'int'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function claim(string $identity)
    {
        $this->claimed_by = $identity;
    }

    public function hasBeenClaimed() : bool
    {
        return $this->claimed_by != null;
    }

    public function hasBeenClaimedBy(string $identity) : bool
    {
        return $this->claimed_by === $identity;
    }

    public function featuredImageUrl()
    {
        $image = $this->images()->where('featured', true)->first();

        return (is_null($image)) ? '' : $image->url;
    }
}
