<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

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

Route::middleware(['auth'])->group(function(){
  Route::get('/', [SearchController::class,'search'])->middleware(
    ['auth'])->name('search');

  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::get('/profile', function () {
    return view('profile');
  })->name('profile');
});

require __DIR__.'/auth.php';
