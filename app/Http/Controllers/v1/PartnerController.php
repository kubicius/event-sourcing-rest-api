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

    public function get(int $id)
    {
        $result = $this->partnerService->getOne($id);
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

    public function delete($id)
    {
        $outcome = $this->partnerService->delete($id);
        return response()->json(null, $outcome === 0 ? 404 : 204);
    }

    public function update(PartnerUpdateRequest $request, int $id)
    {

    }
}
