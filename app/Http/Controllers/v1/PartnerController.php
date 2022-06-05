<?php

namespace App\Http\Controllers\v1;

use App\Http\Requests\PartnerCreateRequest;
use App\Http\Requests\PartnerUpdateRequest;
use App\Services\Interfaces\IPartnerService;
use Illuminate\Http\JsonResponse;

class PartnerController extends Controller
{
    private IPartnerService $partnerService;

    public function __construct(IPartnerService $partnerService)
    {
        $this->partnerService = $partnerService;
    }

    public function get(string $uuid)
    {
        $result = $this->partnerService->getOne($uuid);
        return response()->json($result, !empty($result) ? 200 : 204);
    }

    public function getAll()
    {
        $results = $this->partnerService->getAll();
        return response()->json($results, !empty($results) ? 200 : 204);
    }

    public function create(PartnerCreateRequest $request): JsonResponse
    {
        return response()->json($this->partnerService->create($request->all()), 201);
    }

    public function delete(string $uuid)
    {
        $deleted = $this->partnerService->delete($uuid);
        return response()->json(null, $deleted ? 204 : 404);
    }

    public function update(PartnerUpdateRequest $request, string $uuid)
    {
        $result = $this->partnerService->update($uuid, $request->all());
        return response()->json($result, !empty($result) ? 200 : 404);
    }
}
