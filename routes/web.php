<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SiteController;

Route::resource('books', BookController::class);

Route::get(
    '/',
    [SiteController::class, 'index']

)->name('index');



/****/
/*
Route::match(
    ['get', 'post'],
    '/api/search/{title}',
    [BookController::class, 'search']

)->name('search');

*/

Route::post('api/search', [ BookController::class, 'search' ]);

Route::post('/add', [ BookController::class, 'store' ])->name('store');

Route::post('/remove', [ BookController::class, 'destroy' ])->name('destroy');

Route::put('/edit/{id}', [ BookController::class, 'update' ]);





/*
Route::get('/produto/{name}', function ($id){
    return 'o id é: '. $id;
});*/