<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookApiController;
use App\Models\Study;
use App\Http\Controllers\Api\UserApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/info', function(){
    $data = [
        "status" => "Ok",
        "message" => "mi primer api"
    ];
    return response()->json($data, 200);
});

Route::resource('/books', BookApiController::class)->except(['create', 'edit']);
Route::apiResource('/users', UserApiController::class);
Route::post('/register',[ AuthController::class, 'register']);
Route::post('/login',[ AuthController::class, 'login']);
Route::post('/logout',[ AuthController::class, 'logout']);
Route::post('/refresh',[ AuthController::class, 'refresh']);
Route::post('/usuarioLogeado',[ AuthController::class, 'usuarioLogeado']);
Route::get('/amILogged',[ AuthController::class, 'amILogged']);

Route::group(["middleware" => "role:admin,manager"], function () {
    Route::get("book/json", [BookApiController::class, "json"])->name("posts.json");
    Route::resource("book/create", BookApiController::class)->only("create");
});





