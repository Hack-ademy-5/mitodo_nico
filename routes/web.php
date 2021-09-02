<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
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

Route::get('/', [NoteController::class,'notes'])->name('home');

Route::get('/notes/create',[NoteController::class,'create'])->name('notes.create');
Route::post('/notes',[NoteController::class,'store'])->name('notes.store');
Route::delete('/notes/{id}',[NoteController::class,'destroy'])->name('notes.destroy');

Route::get('/notes/{id}/edit',[NoteController::class,'edit'])->name('notes.edit');
Route::put('/notes/{id}',[NoteController::class,'update'])->name('notes.update');



Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');

Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');

Route::get('/notes/category/{id}',[NoteController::class,'byCategory'])->name('notes.byCategory');
Route::get('/notes/user/{id}',[NoteController::class,'byUser'])->name('notes.byUser');
