<?php

use App\Http\Controllers\Admin\PublisherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function () {
    return view('admin.layouts.master');
});

Route::get('/dashboard', function(){
    return view('admin.pages.dashboard');
})->name('admin.dashboard');

Route::get('/detail-user', function () {
    return view('admin.pages.user');
})->name('user.user-detail');

Route::get('/publisher', [PublisherController::class, 'index'])->name('publihser.index');
Route::post('/publisher', [PublisherController::class, 'store'])->name('publisher.store');
Route::put('/publisher/{id}', [PublisherController::class, 'update'])->name('publisher.update');
Route::delete('/publisher/{id}', [PublisherController::class, 'destroy'])->name('publisher.destroy');
