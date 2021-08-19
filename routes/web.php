<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ActionController;


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

Route::get('/', [ViewController::class, 'showHome']);

Route::get('/about', [ViewController::class, 'showAbout']);

Route::get('/book', [ViewController::class, 'showBook']);

Route::get('/contact', [ViewController::class, 'showContact']);

Route::get('/book_form', [ViewController::class, 'showBookForm']);

Route::post('/modify_book_form', [ViewController::class, 'showModifyBookForm']);

Route::post('/add_book', [ActionController::class, 'addBook']);

Route::post('/delete_book', [ActionController::class, 'deleteBook']);

Route::post('/modify_book', [ActionController::class, 'modifyBook']);
