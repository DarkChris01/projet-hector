<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\AuthenticationAssociationController;
use App\Http\Controllers\TakeatRegistrationRequestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
*/

Route::group(["prefix" => "associations"], function () {
    Route::post("/login", [AuthenticationAssociationController::class, "login"])->name("association.login");
    Route::middleware('auth:sanctum')->group(function () {
        Route::get("/{association}/takeatRegistrationRequest", [AssociationController::class, "getTakeatRegistrationRequest"])->name("api.association.getTakeatRegistrationRequest");
        Route::PUT("/update/{association}", [AssociationController::class, "update"])->name("api.association.update");
        Route::delete("/update/{association}", [AssociationController::class, "destroy"])->name("api.association.destroy");
        Route::post("/{asssociation}/TakeatRegistrationRequest", [TakeatRegistrationRequestController::class, "store"])->name("api.TakeatRegistrationRequest.store");
    });
});
