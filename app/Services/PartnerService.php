<?php

namespace App\Services;

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

    public function getOne(int $id): ?Partner
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
        return $this->partnerRepository->getByUuid((int) $data['uuid']);
    }

    public function update(array $data, int $id): Partner
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): int
    {
        // TODO: Implement delete() method.
    }
}
