<?php

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
    return view('accueil');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Page utilisateur
Route::get('/user/{id}', '\App\Http\Controllers\UserController@userPage')->name('user.show')->whereNumber('id');
Route::get('/user/{id}/update', '\App\Http\Controllers\UserController@userModification')->name('user.modification')->whereNumber('id');
Route::post('/user/update/avatar', '\App\Http\Controllers\UserController@changeAvatar')->name('user.store.avatar');

require __DIR__.'/auth.php';
