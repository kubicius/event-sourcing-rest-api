<?php

namespace App\Services;

use App\Events\PartnerDeleted;
use App\Events\PartnerUpdated;
use App\Helpers\PayloadHelper;
use App\Repositories\Interfaces\IPartnerRepository;
use App\Services\Interfaces\IPartnerService;
use App\Models\Partner;
use App\Events\PartnerCreated;
use Ramsey\Uuid\Uuid;
use Illuminate\Contracts\Support\Arrayable;

class PartnerService implements IPartnerService
{
    private IPartnerRepository $partnerRepository;

    public function __construct(IPartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function getOne(string $uuid, array $fields): ?Partner
    {
        return $this->partnerRepository->getOne($uuid, $fields);
    }

    public function getAll(array $fields, int $perPage): Arrayable
    {
        return $this->partnerRepository->getAll($fields, $perPage);
    }

    public function create(array $data): Partner
    {
        $data['uuid'] = (string) Uuid::uuid4();
        event(new PartnerCreated($data));
        return $this->partnerRepository->getOne($data['uuid']);
    }

    public function update(string $uuid, array $data): ?Partner
    {
        $partnerObj = $this->partnerRepository->getOne($uuid);
        if (!empty($partnerObj))
        {
            $attributes = PayloadHelper::modified($partnerObj, $data);
            if (!empty($attributes))
            {
                event(new PartnerUpdated($uuid, $attributes));
            }
            return $this->partnerRepository->getOne($uuid);
        }
        return null;
    }

    public function delete(string $uuid): bool
    {
        if ($this->partnerRepository->getOne($uuid))
        {
            event(new PartnerDeleted($uuid));
            return true;
        }
        return false;
    }
}
