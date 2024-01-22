<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [App\Http\Controllers\BlogController::class, 'guest'])->name('guest');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('blogs', App\Http\Controllers\BlogController::class);
    Route::get('blogs/{blogId}/upload', [App\Http\Controllers\BlogImageController::class, 'index']);
    Route::post('blogs/{blogId}/upload', [App\Http\Controllers\BlogImageController::class, 'store']);
    Route::get('blog-image/{blogImageId}/delete', [App\Http\Controllers\BlogImageController::class, 'destroy']);

});
