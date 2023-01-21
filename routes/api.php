<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookReviewController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', [UserController::class, 'show']);



Route::get('/books', [BookController::class, 'index']);

Route::get('/books/{id}', [BookController::class, 'show']);

Route::resource('reviews', ReviewController::class)->only(['index']);


Route::get('/book/{id}/review', [BookReviewController::class, 'index'])->name('book.review.index');


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::delete('review/{id}', [ReviewController::class, 'destroy']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::resource('reviews', ReviewController::class)->only(['store','update']);

    Route::post('/logout', [AuthController::class, 'logout']);

});