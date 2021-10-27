<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CategoryController;

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

Route::prefix('admin')->group(function(){
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/do-login', [UserController::class, 'doLogin'])->name('do.login');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings/store', [SettingController::class, 'store'])->name('settings.store');
    Route::get('/settings/single/{lang}', [SettingController::class, 'ajax_settings'])->name('settings.ajax');


    Route::get('/languages', [LanguageController::class, 'index'])->name('languages');
    Route::post('/languages/change-status', [LanguageController::class, 'changeStatus'])->name('languages.status');


    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
});