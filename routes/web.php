<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ADMIN ROUTES

Route::get('admin/dashboard','Admin\AdminController@index')->name('admin.dashboard');

//CATEGORY ROUTES

Route::get('category/create','Admin\CategoryController@create')->name('category.create');
Route::get('category/index','Admin\CategoryController@index')->name('category.index');
Route::post('category/store','Admin\CategoryController@store')->name('category.store');
