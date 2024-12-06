<?php

use App\Http\Controllers\LidController;
use App\Http\Controllers\ReasonLidController;
use App\Http\Controllers\ReasonStatusController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/reason_lids', ReasonLidController::class);
Route::apiResource('/reason_statuses', ReasonStatusController::class);
Route::apiResource('/lids', LidController::class);
