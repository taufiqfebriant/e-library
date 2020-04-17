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



Route::get('/home', 'HomeController@index')->name('home');


/* 
bisa cek di doc bagian controller -> Rute Sumber Daya Parsial 

controller folder admin->userController                  kecuali show , create , store
                                                             maksudnya yang gak dipake                
                                                             
 Route::resource('/admin/users', 'Admin\UserController' , ['except' => ['show' , 'create' , 'store']]);
 */

//  membuat group route => silahkan cek di : php artisan route:list
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UserController' , ['except' => ['show' , 'create' , 'store']]);
});
