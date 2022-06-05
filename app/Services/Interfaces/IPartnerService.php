<?php

namespace App\Services\Interfaces;

use App\Models\Partner;
use Illuminate\Support\Collection;

interface IPartnerService
{
    public function getOne(int $id) : ?Partner;
    public function getAll() : Collection;
    public function create(array $data) : Partner;
    public function update(array $data, int $id) : Partner;
    public function delete(int $id) : int;
}
