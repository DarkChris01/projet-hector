<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\AuthenticationAssociationController;
use App\Http\Controllers\Takeat_registration_requestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group(["prefix" => "associations"], function () {
    Route::get("/login", [AssociationController::class, "login"]);
    Route::post("/login", [AuthenticationAssociationController::class, "login"])->name("association.login");
    Route::get("/", [AssociationController::class, "index"])->name("association.index");
    Route::get("/create", [AssociationController::class, "create"])->name("association.create");
    Route::get("show/{association}", [AssociationController::class, "show"])->name("association.show");
    Route::post("/store", [AssociationController::class, "store"])->name("association.store");
    Route::patch("/approve/{association}", [AssociationController::class, "approved"])->name("association.approve.status");
    Route::patch("/rejecte/{association}", [AssociationController::class, "rejected"])->name("association.rejecte.status");
});

Route::group(["prefix" => "requests"], function () {
    Route::get("/create/{association}", [Takeat_registration_requestController::class, "create"])->name("request.create");
    Route::post("/store", [Takeat_registration_requestController::class, "store"])->name("request.store");
});

require __DIR__ . '/auth.php';
