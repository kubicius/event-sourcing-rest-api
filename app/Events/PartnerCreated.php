<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PartnerCreated extends ShouldBeStored
{
    public array $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }
}
