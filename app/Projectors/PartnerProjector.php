<?php

namespace App\Projectors;

use App\Events\PartnerCreated;
use App\Repositories\Interfaces\IPartnerRepository;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class PartnerProjector extends Projector
{
    private IPartnerRepository $partnerRepository;

    public function __construct(IPartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function onPartnerCreated(PartnerCreated $event)
    {
        $this->partnerRepository->create($event->attributes);
    }
}
