<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(); 
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('books/{book}', 'BookController@show')->name('books.show');
Route::get('users/{user}', 'UserController@show')->name('users.show');
Route::get('plans', 'PlanController@index')->name('plans.index');
Route::middleware(['auth'])->group(function () {
    Route::post('transactions', 'TransactionController@store')->name('transactions.store');
    Route::get('transactions/{transaction}', 'TransactionController@show')->name('transactions.show');
    Route::patch('transactions/{transaction}', 'TransactionController@update')->name('transactions.update');
    Route::patch('books/{book}', 'BookController@update')->name('books.update');
    Route::get('books/read/{book}', 'BookController@read')->name('books.read');
    Route::get('books/files/{file}', 'BookController@file')->name('books.file');
    Route::post('reviews', 'ReviewController@store')->name('reviews.store');
});

// search book testing
Route::get('/search' , 'FrontpageController@searchBooks')->name('search');
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function() {
    Route::resource('dashboard', 'DashboardController');
    Route::resource('authors', 'AuthorController');
    Route::resource('categories', 'CategoryController');
    Route::resource('publishers', 'PublisherController');
    Route::get('books/{book}/preview', 'BookController@preview')->name('books.preview');
    Route::get('books/{book}/file', 'BookController@file')->name('books.file');
    Route::resource('books', 'BookController');
    Route::resource('plans', 'PlanController');
    Route::get('transactions', 'TransactionController@index')->name('transactions.index');
    Route::get('transactions/{transaction}', 'TransactionController@show')->name('transactions.show');
    Route::get('transactions/receipts/{receipt}', 'TransactionController@receipt')->name('transactions.receipt');
    Route::patch('transactions/{transaction}', 'TransactionController@update')->name('transactions.update');
    Route::get('subscriptions', 'SubscriptionController@index')->name('subscriptions.index');
    Route::resource('users', 'UserController' , ['except' => ['show' , 'create' , 'store']]);
});
