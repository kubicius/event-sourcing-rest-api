<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IPartnerService
{
    public function getOne(int $categoryId, int $id) : ?Model;
    public function getAll(int $categoryId) : Collection;
    public function create(array $data, int $categoryId) : ?Model;
    public function update(array $data, int $categoryId, int $id) : ?Model;
    public function delete(int $categoryId, int $id) : int;
}
