<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\TypeController;

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

// route to list clients
Route::get('clients', [ClientController::class, 'index'])->name('clients');

// add client
Route::get('client/add', [ClientController::class, 'add'])->name('addClient');

// store client
Route::post('client/store', [ClientController::class, 'store'])->name('storeClient');

// edit client
Route::get('client/edit/{id}', [ClientController::class, 'edit'])->name('editClient');

// update client
Route::PATCH('client/update/{id}', [ClientController::class, 'update'])->name('updateClient');

// route to list priorities
Route::get('priorities', [PriorityController::class, 'index'])->name('priorities');

// add priority
Route::get('priority/add', [PriorityController::class, 'add'])->name('addPriority');

// store priority
Route::post('priority/store', [PriorityController::class, 'store'])->name('storePriority');

// edit priority
Route::get('priority/edit/{id}', [PriorityController::class, 'edit'])->name('editPriority');

// update priority
Route::PATCH('priority/update/{id}', [PriorityController::class, 'update'])->name('updatePriority');

// route to list types
Route::get('types', [TypeController::class, 'index'])->name('types');

// add type
Route::get('type/add', [TypeController::class, 'add'])->name('addType');

// store type
Route::post('type/store', [TypeController::class, 'store'])->name('storeType');

// edit type
Route::get('type/edit/{id}', [TypeController::class, 'edit'])->name('editType');

// update type
Route::PATCH('type/update/{id}', [TypeController::class, 'update'])->name('updateType');
