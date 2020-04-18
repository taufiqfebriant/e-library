<?php

use Illuminate\Support\Facades\Route;

Auth::routes(); 


Route::get('/', function () {
    return view('welcome');
});

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


/* 
bisa cek di doc bagian controller -> Rute Sumber Daya Parsial 

controller folder admin->userController                  kecuali show , create , store
                                                             maksudnya yang gak dipake                
                                                             
 Route::resource('/admin/users', 'Admin\UserController' , ['except' => ['show' , 'create' , 'store']]);
 */

//  membuat group route => silahkan cek di : php artisan route:list
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::resource('dashboard', 'DashboardController');
    Route::resource('authors', 'AuthorController');
    Route::resource('categories', 'CategoryController');
    Route::resource('publishers', 'PublisherController');
    Route::get('books/{book}/preview', 'BookController@preview')->name('books.preview');
    Route::get('books/{book}/file', 'BookController@file')->name('books.file');
    Route::resource('books', 'BookController');
    Route::resource('/users', 'UserController' , ['except' => ['show' , 'create' , 'store']]);
});
