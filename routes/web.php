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
    Route::resource('books', 'BookController');
    Route::resource('/users', 'UserController' , ['except' => ['show' , 'create' , 'store']]);
});
