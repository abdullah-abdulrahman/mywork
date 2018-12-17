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

Route::get('/', 'HomepageController@index')->name('homepage');
Route::get('/gallery', 'GalleryController@index')->name('gallery');
Route::get('/services', 'ServicesController@index')->name('allServices');
Route::get('/services/{id}', 'ServicesController@show')->name('service');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
