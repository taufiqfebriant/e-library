<?php
use Illuminate\Support\Facades\Route;

Auth::routes(); 

Route::get('/', 'HomeController@index');
Route::get('/satubuku',function(){
    return view('satuHalamanBuku');
});
Route::get('/books', function () {
    return view('book');
});
Route::get('/categories', function () {
    return view('category');
});
Route::get('/paket', function () {
    return view('packets');
});
// search book testing
Route::get('/search' , 'FrontpageController@searchBooks')->name('search');
Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function() {
    Route::resource('dashboard', 'DashboardController');
    Route::resource('authors', 'AuthorController');
    Route::resource('categories', 'CategoryController');
    Route::resource('publishers', 'PublisherController');
    Route::get('books/{book}/preview', 'BookController@preview')->name('books.preview');
    Route::get('books/{book}/file', 'BookController@file')->name('books.file');
    Route::resource('books', 'BookController');
    Route::resource('plans', 'PlanController');
    Route::resource('/users', 'UserController' , ['except' => ['show' , 'create' , 'store']]);
});
