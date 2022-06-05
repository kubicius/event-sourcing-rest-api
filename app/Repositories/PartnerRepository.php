<?php

namespace App\Repositories;

use App\Models\Partner;
use Illuminate\Support\Collection;

class PartnerRepository implements Interfaces\IPartnerRepository
{
    public function getById(int $id): ?Partner
    {
        // TODO: Implement getOne() method.
    }

    public function getByUuid(int $uuid): ?Partner
    {
        return Partner::where('uuid', '=', $uuid)->first();
    }

    public function getAll(): Collection
    {
        // TODO: Implement getAll() method.
    }

    public function create(array $data): Partner
    {
        $payload = [
            'uuid' => $data['uuid'],
            'name' => $data['name'],
            'description' => $data['description'],
            'tax_number' => $data['tax_number']
        ];
        $payload['www'] = $data['www'] ?? null;
        return Partner::create($payload);
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
