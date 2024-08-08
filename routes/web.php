<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/home', [LoginRegisterController::class, 'index'])->name('home');
Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');

Route::group(['prefix' => 'register'], function () {
    Route::get('/', [LoginRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('register.store');
});

Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'company'], function () {
    Route::get('/', [CompanyController::class, 'index'])->name('company.index');
    Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/delete/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/update/{id}', [CompanyController::class, 'update'])->name('company.update');
});