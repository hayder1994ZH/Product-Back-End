<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\LikeCommentsController;

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

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::get('product/{product}', [ProductsController::class, 'show']);
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('auth/logout', [AuthController::class, 'logout']);
    Route::get('auth/details', [AuthController::class, 'details']);
    Route::put('auth/profile', [AuthController::class, 'update']);
    Route::apiResource('user', UserController::class);
    Route::apiResource('rule', RulesController::class);
    Route::apiResource('product', ProductsController::class)->except([
        'show'
    ]);
});
