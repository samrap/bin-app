<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
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
}
