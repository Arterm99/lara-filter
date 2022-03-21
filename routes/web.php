<?php

use Illuminate\Support\Facades\Route;

// My
use Illuminate\Support\Facades\App;

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
    if (App::environment(['local', 'staging'])) {
        echo "The environment is either local OR staging...";
    }
    
    return view('welcome');
});
