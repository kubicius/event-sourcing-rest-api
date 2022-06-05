<?php

namespace App\Repositories\Interfaces;

use App\Models\Partner;
use Illuminate\Support\Collection;

interface IPartnerRepository
{
    public function getOne(string $uuid) : ?Partner;
    public function getAll() : Collection;
    public function create(array $data) : Partner;
    public function update(string $uuid, array $data) : Partner;
    public function delete(string $uuid) : int;
}
