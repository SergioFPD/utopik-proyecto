<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\NavController;

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



Route::get('/', [NavController::class, 'index'])->name('landing');
Route::get('/experience/detail/{nombre}', [NavController::class, 'viewDetail'])->name('experience.detail');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/admin-profile/{menu}', [AdminController::class, 'viewProfile'])->name('admin.profile');
    Route::post('/admin/create/user', [AdminController::class, 'createUser'])->name('admin.create.user');
    Route::put('/admin/update/user/{user}', [AdminController::class, 'updateUser'])->name('admin.update.user');
    Route::delete('/admin/delete/user/{user}', [AdminController::class, 'deleteUser'])->name('admin.delete.user');
});

Route::middleware(['auth', 'role:proveedor'])->group(function () {
    
    Route::get('/provider/prov-profile/{menu}', [ProviderController::class, 'viewProviderProfile'])->name('provider.profile');

    Route::get('/experience/form', [ProviderController::class, 'experienceCreateForm'])->name('experience.form');
    Route::post('/experience/store', [ProviderController::class, 'storeExperience'])->name('experience.store');
    Route::get('/experience/modify/{id}', [ProviderController::class, 'experienceModifyForm'])->name('experience.modify');
    Route::post('/experience/update/{id}', [ProviderController::class, 'updateExperience'])->name('experience.update');

    Route::get('/activity/form/{experience_id}', [ProviderController::class, 'activityCreateForm'])->name('activity.form');
    Route::post('/activity/store', [ProviderController::class, 'storeActivity'])->name('activity.store');
    Route::get('/activity/modify/{id}', [ProviderController::class, 'activityModifyForm'])->name('activity.modify');
    Route::post('/activity/update/{id}', [ProviderController::class, 'updateActivity'])->name('activity.update');
    Route::delete('/activity/delete/{id}', [ProviderController::class, 'deleteActivity'])->name('activity.delete');
});



Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/client/client-profile/{menu}', [UserController::class, 'viewClientProfile'])->name('client.profile');
    Route::post('/client/store/reserve', [UserController::class, 'storeReserve'])->name('reserve.store');
    Route::get('/form/reserve/{experience}', [NavController::class, 'formReserve'])->name('form.reserve');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
    
});

Route::middleware(['guest','blocked'])->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/register/user', [RegisterController::class, 'registerUser'])->name('register.user');
});


Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang');