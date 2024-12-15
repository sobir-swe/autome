<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CenterSocialNetworkController;
use App\Http\Controllers\CenterTypeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LidController;
use App\Http\Controllers\ReasonLidController;
use App\Http\Controllers\ReasonStatusController;
use App\Http\Controllers\SocialNetworkController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentResponsibleController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/reason_lids', ReasonLidController::class);
Route::apiResource('/reason_statuses', ReasonStatusController::class);
Route::apiResource('/lids', LidController::class);
Route::apiResource('/center_types', CenterTypeController::class);
Route::apiResource('/centers', CenterController::class);
Route::apiResource('/social_networks', SocialNetworkController::class);
Route::apiResource('center_social_networks', CenterSocialNetworkController::class);
Route::apiResource('/branches', BranchController::class);
Route::apiResource('/instructors', InstructorController::class);
Route::apiResource('/students', StudentController::class);
Route::apiResource('/student_responsibles', StudentResponsibleController::class);
