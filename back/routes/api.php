<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BookController;

// Author
Route::get('books', [BookController::class, 'getAllBooks']);
Route::post('books', [BookController::class, 'createBook']);
Route::get('books/{id}', [BookController::class, 'getBook']);
Route::put('books/{id}', [BookController::class, 'updateBook']);
Route::delete('books/{id}', [BookController::class, 'deleteBook']);