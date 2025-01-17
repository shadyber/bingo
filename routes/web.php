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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::post('/generatecards',[\App\Http\Controllers\CardController::class,'generateCards'])->name('generatecards');

Route::post('newregister',[\App\Http\Controllers\AgentController::class,'newregister'])->name('newregister');
Route::get('/referral',[\App\Http\Controllers\ReferalController::class,'index'])->name('referral.index');
Route::get('/referral/create',[\App\Http\Controllers\ReferalController::class,'create'])->name('referral.create');
    Route::resource('/card',\App\Http\Controllers\CardController::class);

    Route::resource('/agent',\App\Http\Controllers\AgentController::class);

  Route::post('/toggelcard',[\App\Http\Controllers\CardController::class,'togglecard'])->name('toggelcard');
 Route::post('/newgame   ',[\App\Http\Controllers\GameController::class,'startnewgame'])->name('startnewgame');
 Route::get('/newgame',\App\Http\Livewire\GameControll::class)->name("starter");
    Route::post('/endgame   ',[\App\Http\Controllers\GameController::class,'endgame'])->name('endgame');
    Route::post('/resetgame   ',[\App\Http\Controllers\GameController::class,'resetGame'])->name('resetgames');

    Route::get('/dashboard', function () {

        return view('dashboard');

    })->name('dashboard');

});
