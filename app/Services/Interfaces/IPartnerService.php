<?php

namespace App\Services\Interfaces;

use App\Models\Partner;
use Illuminate\Support\Collection;

interface IPartnerService
{
    public function getOne(string $uuid) : ?Partner;
    public function getAll() : Collection;
    public function create(array $data) : Partner;
    public function update(string $uuid, array $data) : ?Partner;
    public function delete(string $uuid) : bool;
}
