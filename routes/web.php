<?php

use App\Http\Controllers\Admin\MobilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|p
*/

Route::controller(AuthController::class)->group(function () 
{
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate')->name('authenticate');
        // Route::get('/register', 'register')->name('register');
        // Route::post('/register', 'createRegister')->name('createRegister');
    });
    Route::get('admin/logout', 'logout')->name('logout')->middleware('auth');
});

Route::group(['middleware' => 'is_admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('mobil', MobilController::class);
    Route::put('mobil/update-image/{id}', [MobilController::class,'updateImage'])->name('mobil.updateImage');

    Route::get('message', [MessageController::class, 'index'])->name('message.index');
    Route::delete('message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::post('contact', [HomeController::class, 'contactStore'])->name('contact.store');
// Route::get('login', [HomeController::class, 'login'])->name('login');
// Route::post('loginakun', [HomeController::class, 'loginakun'])->name('loginakun');
// Route::get('admin/logout', [HomeController::class, 'logout'])->name('logout');


