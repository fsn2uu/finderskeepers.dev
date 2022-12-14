<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HirlingController;
use App\Http\Controllers\QuestController;

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
    $events = App\Models\Event::all();
    return view('welcome')
        ->withEvents($events);
})->name('dashboard');

Route::resource('contracts', ContractController::class);
Route::resource('events', EventController::class);
Route::resource('hirlings', HirlingController::class);
Route::resource('quests', QuestController::class);
