<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/linkstore', function () {
    Artisan::call('storage:link');
});

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/', function () {
    return redirect(route('login'));
});
Auth::routes();

// Socialite routes
Route::group(['as' => 'login.', 'prefix' => 'login', 'namespace' => 'Auth'], function () {
    Route::get('/{provider}', [LoginController::class, 'redirectToProvider'])->name('provider');
    Route::get('/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('callback');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect(route('app.dashboard'));
});
// Pages route e.g. [about,contact,etc]
Route::get('page/{slug}', [PageController::class,'index'])->name('page');
