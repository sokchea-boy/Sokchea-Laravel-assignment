<?php

use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix("/books")->group(function(){
    Route::get("/", [BooksController:: class, "index"])->name("/allbook");
    Route::get("/{id}",[BooksController::class,"show"]);
    Route::post("/",[BooksController::class,"create"]);
    Route::put("/{id}",[BooksController::class,"edit"]);
    Route::delete("/{id}", [BooksController::class,"Delete"]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
