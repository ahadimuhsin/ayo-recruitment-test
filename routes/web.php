<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ReportController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::group(['prefix' => 'teams', 'as' => 'teams.'], function(){
        Route::get('/', [TeamController::class, 'index'])->name('index');
        Route::get('/create', [TeamController::class, 'create'])->name('create');
        Route::post('/', [TeamController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TeamController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TeamController::class, 'update'])->name('update');
        Route::delete('/{id}', [TeamController::class, 'destroy'])->name('destroy');

        // Bagian Player
        Route::get('/{id}/players', [PlayerController::class, 'index'])->name('player.index');
        Route::get('/{id}/create/players', [PlayerController::class, 'create'])->name('player.create');
        Route::post('/{id}/players', [PlayerController::class, 'store'])->name('player.store');
    });

    Route::group(['prefix' => 'matches', 'as' => 'matches.'], function(){
        Route::get('/', [MatchController::class, 'index'])->name('index');
        Route::get('/create', [MatchController::class, 'create'])->name('create');
        Route::post('/', [MatchController::class, 'store'])->name('store');

        Route::get('/{id}/reports', [ReportController::class, 'index'])->name('report.index');
        Route::get('/{id}/create/reports', [ReportController::class, 'create'])->name('report.create');
        Route::post('/{id}/reports', [ReportController::class, 'store'])->name('report.store');
        Route::get('/{id}/detail', [ReportController::class, 'detail'])->name('report.detail');
    });


    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
