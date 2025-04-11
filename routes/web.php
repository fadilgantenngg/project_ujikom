<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('frontend');
});

Auth::routes(['register' =>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['auth']],function(){
    Route::get('/',function() {
        return view('admin.index');
    });
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/genre', GenreController::class);
    Route::resource('/film', FilmController::class);
    Route::resource('/review', ReviewController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
