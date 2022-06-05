<?php

use App\Http\Controllers\v1\PartnerController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/')->group(function ()
{
    Route::post('partners', [PartnerController::class, 'create']);
    Route::get('partners/{id}', [PartnerController::class, 'get']);
    Route::patch('partners/{id}', [PartnerController::class, 'update']);
    Route::delete('partners/{id}', [PartnerController::class, 'delete']);
});
