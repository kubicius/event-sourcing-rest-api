<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Services\Interfaces\IPartnerService;

class PartnerService implements IPartnerService
{

    public function getOne(int $categoryId, int $id): ?Model
    {
        // TODO: Implement getOne() method.
    }

    public function getAll(int $categoryId): Collection
    {
        // TODO: Implement getAll() method.
    }

    public function create(array $data, int $categoryId): ?Model
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, int $categoryId, int $id): ?Model
    {
        // TODO: Implement update() method.
    }

    public function delete(int $categoryId, int $id): int
    {
        // TODO: Implement delete() method.
    }
}
