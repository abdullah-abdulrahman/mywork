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
Route::post('/', 'HomepageController@sendMessage');
Route::post('/newsletter', 'HomepageController@subscribe');

Route::get('/gallery', 'GalleryController@index')->name('gallery');
Route::get('/services', 'ServicesController@index')->name('allServices');
Route::get('/services/{id}', 'ServicesController@show')->name('service');
Route::get('/projects/{id}', 'ProjectsController@show')->name('project');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('admin');


Route::group(['prefix'=>'home','namespace'=>'Admin'],function(){

    Route::get('/team', 'TeamController@index')->name('admin.team');
    Route::patch('/team', 'TeamController@update')->name('admin.team.update');

    Route::get('/slider', 'SliderController@index')->name('admin.slider');
    Route::get('/slider/create', 'SliderController@create')->name('admin.slider.create');
    Route::post('/slider', 'SliderController@store')->name('admin.slider.store');
    Route::get('/slider/{id}/edit', 'SliderController@edit')->name('admin.slider.edit');
    Route::patch('/slider/{id}', 'SliderController@update')->name('admin.slider.update');
    Route::delete('/slider/{id}', 'SliderController@destroy')->name('admin.slider.destroy');

    Route::get('/about', 'AboutController@index')->name('admin.about');
    Route::get('/about/{id}/edit', 'AboutController@edit')->name('admin.about.edit');
    Route::patch('/about/{id}', 'AboutController@update')->name('admin.about.update');


    Route::get('/settings', 'SettingsController@index')->name('admin.settings');
    Route::patch('/settings', 'SettingsController@update')->name('admin.settings.update');

    Route::get('/contact', 'ContactController@index')->name('admin.contact');
    Route::patch('/contact', 'ContactController@update')->name('admin.contact.update');

    Route::get('/facts', 'ContactController@index')->name('admin.facts');

    Route::get('/gallery', 'ContactController@index')->name('admin.gallery');

    Route::get('/partners', 'ContactController@index')->name('admin.partners');
   

});
