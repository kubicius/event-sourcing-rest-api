<?php

namespace App\Repositories;

use App\Helpers\PayloadHelper;
use App\Models\Partner;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Pagination\Paginator;

class PartnerRepository implements Interfaces\IPartnerRepository
{
    public function getOne(string $uuid, array $fields = []): ?Partner
    {
        $queryBuilderObj = Partner::where('uuid', '=', $uuid);
        if (!empty($fields))
        {
            $selectArray = PayloadHelper::validFields(Partner::class, $fields);
            $queryBuilderObj->select($selectArray);
        }
        return $queryBuilderObj->first();
    }

    public function getAll(array $fields, int $perPage): Arrayable
    {
        if (!empty($fields))
        {
            $selectArray = PayloadHelper::validFields(Partner::class, $fields);
        }
        return Partner::paginate($perPage, $selectArray ?? ['*']);
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

    public function update(string $uuid, array $data): ?Partner
    {
        $partnerObj = Partner::where('uuid', '=', $uuid)->first();
        if (!empty($partnerObj))
        {
            $partnerObj->name = $data['name'] ?? $partnerObj->name;
            $partnerObj->description = $data['description'] ?? $partnerObj->description;
            $partnerObj->tax_number = $data['tax_number'] ?? $partnerObj->tax_number;
            $partnerObj->www = $data['www'] ?? $partnerObj->www;
            $partnerObj->save();
            return $partnerObj;
        }
        return null;
    }

    public function delete(string $uuid): bool
    {
        return Partner::where('uuid', '=', $uuid)->delete() !== 0;
    }
}
