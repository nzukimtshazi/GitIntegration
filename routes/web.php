<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepositoryController;

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

// route to list users
Route::get('repositories', [RepositoryController::class, 'index'])->name('repositories');

// add repository
Route::get('repository/add', [RepositoryController::class, 'add'])->name('addRepository');

// store repository
Route::post('repository/store', [RepositoryController::class, 'store'])->name('storeRepository');

// edit repository
Route::get('repository/edit/{id}', [RepositoryController::class, 'edit'])->name('editRepository');

// update repository
Route::PATCH('repository/update/{id}', [RepositoryController::class, 'update'])->name('updateRepository');

