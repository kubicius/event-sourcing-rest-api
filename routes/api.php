<?php

use App\Http\Controllers\v1\PartnerController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/')->group(function ()
{
    Route::post('partners', [PartnerController::class, 'create']);
    Route::get('partners/{uuid}', [PartnerController::class, 'get']);
    Route::get('partners', [PartnerController::class, 'getAll']);
    Route::put('partners/{uuid}', [PartnerController::class, 'update']);
    Route::delete('partners/{uuid}', [PartnerController::class, 'delete']);
});
