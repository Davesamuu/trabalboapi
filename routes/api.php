<?php

use App\Http\Controllers\SportController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\CompetitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/meus-dados', function () {
    return response()->json([
        'nome_completo' => 'Davi Samuel',
        'ra' => '3596'
    ]);
});

Route::apiResource('/sports', SportController::class);

Route::apiResource('/locales', LocaleController::class);

Route::apiResource('/trainers', TrainerController::class);

Route::apiResource('/competitors', CompetitorController::class);