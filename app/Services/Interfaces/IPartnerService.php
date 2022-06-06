<?php

namespace App\Services\Interfaces;

use App\Models\Partner;
use Illuminate\Contracts\Support\Arrayable;

interface IPartnerService
{
    public function getOne(string $uuid, array $fields) : ?Partner;
    public function getAll(array $fields, int $perPage) : Arrayable;
    public function create(array $data) : Partner;
    public function update(string $uuid, array $data) : ?Partner;
    public function delete(string $uuid) : bool;
}
