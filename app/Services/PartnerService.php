<?php

namespace App\Services;

use App\Events\PartnerUpdated;
use App\Repositories\Interfaces\IPartnerRepository;
use Illuminate\Support\Collection;
use App\Services\Interfaces\IPartnerService;
use App\Models\Partner;
use App\Events\PartnerCreated;
use Ramsey\Uuid\Uuid;

class PartnerService implements IPartnerService
{
    private IPartnerRepository $partnerRepository;

    public function __construct(IPartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function getOne(string $uuid): ?Partner
    {
        // TODO: Implement getOne() method.
    }

    public function getAll(): Collection
    {
        // TODO: Implement getAll() method.
    }

    public function create(array $data): Partner
    {
        $data['uuid'] = (string) Uuid::uuid4();
        event(new PartnerCreated($data));
        return $this->partnerRepository->getOne($data['uuid']);
    }

    public function update(string $uuid, array $data): Partner
    {
        event(new PartnerUpdated($uuid, $data));
        return $this->partnerRepository->getOne($uuid);
    }

    public function delete(string $uuid): int
    {
        // TODO: Implement delete() method.
    }
}
