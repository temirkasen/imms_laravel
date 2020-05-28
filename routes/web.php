<?php

use Illuminate\Support\Facades\Route;

//Админка
//Route::domain('admin.imms.local')->as('admin.')->namespace('Admin')->group(function () {
Route::as('admin.')->middleware('auth')->namespace('Admin')->prefix('/admin')->group(function () {
    Route::namespace('Home')->group(function () {
        Route::get('/', 'CommonController@index')->name('home');
    });
//
//    Route::get('/profile/create', 'Profile\CommonController@create');
//
//
});

//Пользователи
//Route::domain('imms.local')->as('customer.')->namespace('Customer')->group(function () {
Route::as('customer.')->middleware('auth')->namespace('Customer')->group(function () {
    Route::namespace('Home')->group(function () {
        Route::get('/', 'CommonController@index')->name('home');
        Route::get('/home', 'CommonController@index')->name('home');
    });

});

Route::get('/403', 'UserController@permission')->name('403');

Auth::routes();
