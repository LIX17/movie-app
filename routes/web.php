<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MovieController::class, 'index'])->name('home');
Route::get('/detail/{id}', [MovieController::class, 'detail'])->name('detail');
Route::get('/list/{slug}', [MovieController::class, 'list'])->name('list');
Route::get('/about', [MovieController::class, 'about'])->name('about');
Route::get('/contact', [MovieController::class, 'contact'])->name('contact');
Route::post('/contact', [MovieController::class, 'contact_form'])->name('contact-form');

Route::get('/api/list', [MovieController::class, 'list_api'])->name('list-api');