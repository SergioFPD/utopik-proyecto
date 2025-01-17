<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
    return view('landing');
})->name('landing');


Route::get('/index', [UserController::class, 'index'])->name('index');

Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin.users');
Route::post('/admin/create/user', [AdminController::class, 'createUser'])->name('admin.create.user');
Route::put('/admin/update/user/{user}', [AdminController::class, 'updateUser'])->name('admin.update.user');