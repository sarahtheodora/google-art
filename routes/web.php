<?php

use App\Http\Controllers\GoogleArtController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'CheckRole:admin']], function () {
    Route::view('admin', 'admin.country')->name('admin.country');
    Route::view('admin/entity', 'admin.entity')->name('admin.entity');
    Route::view('admin/partner', 'admin.partner')->name('admin.partner');
    Route::view('admin/exhibit', 'admin.exhibit')->name('admin.exhibit');
    Route::view('admin/asset', 'admin.asset')->name('admin.asset');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');
    Route::view('/profile', 'profile/google-art')->name('profile.google-art');
    Route::get('/', [GoogleArtController::class, 'index'])->name('home');
    Route::get('/entity/{id}', [GoogleArtController::class, 'entity'])->name('entity');
    Route::get('/partner/{id}', [GoogleArtController::class, 'partner'])->name('partner');
    Route::get('/exhibit/{id}', [GoogleArtController::class, 'exhibit'])->name('exhibit');
    Route::get('/collection/{id}', [GoogleArtController::class, 'collection'])->name('collection');
    Route::get('/asset/{id}', [GoogleArtController::class, 'asset'])->name('asset');
});