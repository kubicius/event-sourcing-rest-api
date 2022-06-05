<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PartnerUpdated extends ShouldBeStored
{
    public string $uuid;
    public array $attributes;

    public function __construct(string $uuid, array $attributes)
    {
        $this->uuid = $uuid;
        $this->attributes = $attributes;
    }
}
