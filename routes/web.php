<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('books/{book}-{slug}', 'BookController@show')->name('books.show');
Route::get('plans', 'PlanController@index')->name('plans.index');
Route::get('categories', 'CategoryController@index')->name('categories.index');
Route::get('search', 'SearchController@index')->name('search.index');
Route::get('auth/check', 'Auth\AuthController@check')->name('auth.check');
Route::get('pagination/reviews', 'PaginationController@reviews')->name('pagination.reviews');
Route::middleware('auth')->group(function () {
    Route::resource('cart', 'CartController');
    Route::middleware('verified')->group(function () {
        Route::get('loans/auth-user', 'LoanController@authUser');
        Route::resource('loans', 'LoanController');
        Route::post('loans/cart', 'LoanController@storeFromCart')->name('loans.cart');
        Route::get('users/{user}', 'UserController@show')->name('users.show');
        Route::get('users/{user}/personal-info', 'UserController@personalInfo')->name('users.personal-info');
        Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
        Route::patch('users/{user}', 'UserController@update')->name('users.update');
        Route::get('users/{user}/loans', 'UserController@loans')->name('users.loans');
        Route::patch('users/{user}/books/{book}', 'UserController@returnBook')->name('users.return-book');
        Route::get('users/{user}/transactions', 'UserController@transactions')->name('users.transactions');
        Route::get('users/{user}/change-password', 'UserController@changePassword')->name('users.change-password');
        Route::patch('users/{user}/update-password', 'UserController@updatePassword')->name('users.update-password');
        Route::post('transactions', 'TransactionController@store')->name('transactions.store');
        Route::get('transactions/{transaction}', 'TransactionController@show')->name('transactions.show');
        Route::patch('transactions/{transaction}', 'TransactionController@update')->name('transactions.update');
        Route::get('books/{book}-{slug}/read', 'BookController@read')->name('books.read');
        Route::get('books/files/{file}', 'BookController@file')->name('books.file');
        Route::post('reviews', 'ReviewController@store')->name('reviews.store');
        Route::patch('reviews/{review}', 'ReviewController@update')->name('reviews.update');
        Route::delete('reviews/{review}', 'ReviewController@destroy')->name('reviews.destroy');
        Route::get('api/reviews', 'ReviewController@apiGet');
    });
    Route::delete('cart', 'CartController@multipleDestroy')->name('cart.multiple-destroy');
    Route::get('notifications', 'NotificationController@index')->name('notifications.index');
    Route::post('notifications/mark-as-read', 'NotificationController@markAsRead')->name('notifications.mark-as-read');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth', 'can:manage-users')->group(function() {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
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
    Route::get('loans', 'LoanController@index')->name('loans.index');
    Route::resource('users', 'UserController');
    Route::get('settings', 'SettingsController@index')->name('settings.index');
    Route::patch('settings', 'SettingsController@update')->name('settings.update');
});