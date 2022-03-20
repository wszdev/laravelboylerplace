<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('admin-db');


Route::get('/make-migration', [HomeController::class, 'makeMigration']);


// Route::get('/roleback-migration', [HomeController::class, 'resetDatabase']);


Route::get('/run', [HomeController::class, 'editENVfile']);

Route::get('/dynamic-redirect', [HomeController::class, "testRed"]);