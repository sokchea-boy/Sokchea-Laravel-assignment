<?php

use App\Http\Controllers\Api\v1\BookController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UserController;
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
    Route::delete("/{id}", [BooksController::class,"delete"]);
});

Route::prefix("/authors")->group(function(){
    Route::get("/", [AuthorsController::class, 'index']);
    Route::get("/{id}", [AuthorsController::class, 'show']);
    Route::post("/", [ AuthorsController::class, 'create']);
    Route::put('/{id}', [AuthorsController::class, 'edit']);
    Route::delete('/{id}', [AuthorsController::class, 'delete']);
});

Route::prefix("/users")->group(function(){
    Route::get("/", [UserController::class, 'index']);
    Route::get("/{id}", [UserController::class, 'show']);
    Route::post("/", [ UserController::class, 'create']);
    Route::put('/{id}', [UserController::class, 'edit']);
    Route::delete('/{id}', [UserController::class, 'delete']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function (){
    
    Route::apiResource('/books', BookController::class);
});

