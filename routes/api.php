<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\WorkExperienceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [Controller::class, 'routes'])
    ->name('route information')
    ->withoutMiddleware('api');
Route::get('/example', [Controller::class, 'example'])->name('example route');
Route::get('/error', [Controller::class, 'error'])->name('error route');

Route::get('/profiles', [ProfileController::class, 'index']);
Route::apiResource('experiences', WorkExperienceController::class);
Route::apiResource('summary', SummaryController::class);
Route::apiResource('education', EducationController::class);
Route::apiResource('skills', SkillController::class);
Route::apiResource('interests', InterestController::class);
Route::delete('/achievements/{id}', [AchievementController::class, 'destroy']);
