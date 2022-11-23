<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoujinshiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::post("/register-doujinshi",[DoujinshiController::class, 'register'])->name('register.doujinshi');
    Route::get("/update-doujinshi", [DoujinshiController::class, 'updateFile'])->name('updateFile.doujinshi');
    Route::post("/update-doujinshi_post", [DoujinshiController::class, 'updateFileP'])->name('updateFileP.doujinshi');
    Route::post("/remove_doujinshi",[DoujinshiController::class, 'remove'])->name('remove.doujinshi');
});

Route::get("/doujinshi/{name}",[DoujinshiController::class, 'view_doujinshi'])->name('view.doujinshi');
Route::get("/doujinshi/{name}/{chap}",[DoujinshiController::class, 'view_doujinshi_chap'])->name('viewChap.doujinshi');
Route::get("/search",[DoujinshiController::class, 'search'])->name('search.doujinshi');





