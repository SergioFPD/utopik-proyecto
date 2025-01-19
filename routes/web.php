<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ExperienciaController;

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

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/admin-profile/{menu}', [AdminController::class, 'viewProfile'])->name('admin.profile');
    Route::post('/admin/create/user', [AdminController::class, 'createUser'])->name('admin.create.user');
    Route::put('/admin/update/user/{user}', [AdminController::class, 'updateUser'])->name('admin.update.user');
    Route::delete('/admin/delete/user/{user}', [AdminController::class, 'deleteUser'])->name('admin.delete.user');
});

Route::middleware(['auth', 'role:proveedor'])->group(function () {

    Route::post('/experience/create', [ExperienciaController::class, 'createExperience'])->name('experience.create');
    Route::get('/provider/prov-profile/{menu}', [UserController::class, 'viewProviderProfile'])->name('provider.profile');
});


Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/client/client-profile/{menu}', [UserController::class, 'viewClientProfile'])->name('client.profile');
});

Route::get('/', [UserController::class, 'index'])->name('landing');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
});
Route::middleware('guest')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/register/user', [RegisterController::class, 'registerUser'])->name('register.user');
});
