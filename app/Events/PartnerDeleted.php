<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PartnerDeleted extends ShouldBeStored
{
    public string $uuid;

    public function __construct(string $uuid, array $attributes)
    {
        $this->uuid = $uuid;
    }
}
