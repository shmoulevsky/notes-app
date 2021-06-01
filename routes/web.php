<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\NoteController;

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



Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/', [IndexController::class, 'index'])->name('index');;
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.list');
    Route::get('/notes/favor', [NoteController::class, 'favor'])->name('notes.favor');    
    Route::get('/notes/latest', [NoteController::class, 'latest'])->name('notes.latest');   
    Route::get('/notes/top', [NoteController::class, 'top'])->name('notes.top');   
    Route::get('/notes/{id}', [NoteController::class, 'showDetail'])->name('show.note');;
   

    Route::get('/themes', [ThemeController::class, 'index'])->name('theme.index');;

});


require __DIR__.'/auth.php';
