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
Route::get('category/edit/{id}','Admin\CategoryController@edit')->name('category.edit');
Route::post('category/update/{id}','Admin\CategoryController@update')->name('category.update');
Route::get('category/delete/{id}','Admin\CategoryController@delete')->name('category.delete');
