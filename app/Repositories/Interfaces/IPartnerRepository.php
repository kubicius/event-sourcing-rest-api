<?php

namespace App\Repositories\Interfaces;

use App\Models\Partner;
use Illuminate\Support\Collection;

interface IPartnerRepository
{
    public function getById(int $id) : ?Partner;
    public function getByUuid(string $uuid) : ?Partner;
    public function getAll() : Collection;
    public function create(array $data) : Partner;
    public function update(array $data, int $id) : Partner;
    public function delete(int $id) : int;
}
