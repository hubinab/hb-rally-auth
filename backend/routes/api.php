<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// A tanar a videoban eltert az utvonalaktol es kontrollerektol
// ezert nem a feladatnak megfeleloek vannak
Route::post("/register", [RegistrationController::class, "registration"])
    ->name("register.registration")
;

Route::post("/login", [AuthController::class, "login"])
    ->name("login.login")
;

Route::apiResource('/races', RaceController::class)
    ->whereNumber("race")
    ->only(["index", "show"])
;

// A frontend teszt miatt az index-et atteszem alulra
Route::apiResource('/teams', TeamController::class)
    ->whereNumber("team")
    ->only(["show", "destroy"])
;

Route::middleware(["auth:sanctum"])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::apiResource('/races', RaceController::class)
        ->whereNumber("race")
        ->only(["store", "update", "destroy"])
    ;

    // A frontend teszt miatt az index-et ide tettem
    Route::apiResource('/teams', TeamController::class)
        ->whereNumber("team")
        ->only(["index", "store", "update"])
    ;
});
