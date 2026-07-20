<?php

use App\Http\Controllers\Admin\PublisherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/main', function () {
    return view('admin.pages.dashboard');
});

Route::get('/dashboard', function(){
    return view('admin.pages.dashboard');
})->name('admin.dashboard');

Route::get('/detail-user', function () {
    return view('admin.pages.user');
})->name('user.user-detail');

Route::get('/admin/categories/tables', function(){
    return view('admin.tables.categories');
})->name('admin.categories.table');

Route::get('/admin/publishers/tables', function () {
    return view('admin.tables.publisher');
})->name('admin.publishers.table');

Route::get('/admin/books/tables', function () {
    return view('admin.tables.books');
})->name('admin.books.table');

Route::get('/publisher', [PublisherController::class, 'index'])->name('publihser.index');
Route::post('/publisher', [PublisherController::class, 'store'])->name('publisher.store');
Route::put('/publisher/{id}', [PublisherController::class, 'update'])->name('publisher.update');
Route::delete('/publisher/{id}', [PublisherController::class, 'destroy'])->name('publisher.destroy');
