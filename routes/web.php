<?php

use App\Http\Controllers\AdminPanelController;
use Illuminate\Support\Facades\Route;


// My project
use Illuminate\Support\Facades\Cache;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// My project

Route::get('/cache', function () {
    return Cache::get('key');
});

Route::get('/', function () {
    return view('product');
})->name('home');

// Добавление товаров в БД
Route::match(['get', 'post'], '/regprod', [AdminPanelController::class, 'admin']);