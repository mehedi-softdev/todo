<?php

use App\Http\Controllers\todoController;
use Illuminate\Support\Facades\Route;



Route::get("/", [todoController::class, 'home'])->name("home");
Route::any("/store", [todoController::class, 'store'])->name("store");
// fetch data
Route::get("/fetch", [todoController::class, 'getList'])->name("getList");
Route::get("/delete/{id}", [todoController::class, 'delete'])->name("delete");
Route::get("/update/{id}", [todoController::class, 'update'])->name("update");


