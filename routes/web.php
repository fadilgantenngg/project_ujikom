<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' =>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['auth']],function(){
    Route::get('/',function() {
        return view('admin.index');
    });
    Route::resource('/kategori', KategoriController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
