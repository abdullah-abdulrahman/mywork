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
Route::post('/', 'HomepageController@sendMessage')->name('sendMessage');
Route::post('/newsletter', 'HomepageController@subscribe')->name('subscribe');

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
    Route::get('/slider/{id}', 'SliderController@show')->name('admin.slider.show');
    Route::get('/slider/{id}/edit', 'SliderController@edit')->name('admin.slider.edit');
    Route::patch('/slider/{id}', 'SliderController@update')->name('admin.slider.update');
    Route::delete('/slider/{id}', 'SliderController@destroy')->name('admin.slider.destroy');

    Route::get('/about', 'AboutController@index')->name('admin.about');
    Route::get('/about/{id}/edit', 'AboutController@edit')->name('admin.about.edit');
    Route::patch('/about/{id}', 'AboutController@update')->name('admin.about.update');

    Route::get('/facts', 'FactsController@index')->name('admin.facts');
    Route::patch('/facts', 'FactsController@update')->name('admin.facts.update');

    Route::get('/settings', 'SettingsController@index')->name('admin.settings');
    Route::patch('/settings', 'SettingsController@update')->name('admin.settings.update');

    Route::get('/contact', 'ContactController@index')->name('admin.contact');
    Route::patch('/contact', 'ContactController@update')->name('admin.contact.update');

    Route::get('/partners', 'PartnersController@index')->name('admin.partners');
    Route::get('/partners/create', 'PartnersController@create')->name('admin.partners.create');
    Route::post('/partners', 'PartnersController@store')->name('admin.partners.store');
    Route::get('/partners/{id}', 'PartnersController@show')->name('admin.partners.show');
    Route::get('/partners/{id}/edit', 'PartnersController@edit')->name('admin.partners.edit');
    Route::patch('/partners/{id}', 'PartnersController@update')->name('admin.partners.update');
    Route::delete('/partners/{id}', 'PartnersController@destroy')->name('admin.partners.destroy');

    Route::get('/projects', 'ProjectsController@index')->name('admin.projects');
    Route::get('/projects/create', 'ProjectsController@create')->name('admin.projects.create');
    Route::post('/projects', 'ProjectsController@store')->name('admin.projects.store');
    Route::get('/projects/{id}', 'ProjectsController@show')->name('admin.projects.show');
    Route::get('/projects/{id}/edit', 'ProjectsController@edit')->name('admin.projects.edit');
    Route::patch('/projects/{id}', 'ProjectsController@update')->name('admin.projects.update');
    Route::delete('/projects/{id}', 'ProjectsController@destroy')->name('admin.projects.destroy');

    Route::get('/services', 'ServicesController@index')->name('admin.services');
    Route::get('/services/create', 'ServicesController@create')->name('admin.services.create');
    Route::post('/services', 'ServicesController@store')->name('admin.services.store');
    Route::get('/services/{id}', 'ServicesController@show')->name('admin.services.show');
    Route::get('/services/{id}/edit', 'ServicesController@edit')->name('admin.services.edit');
    Route::patch('/services/{id}', 'ServicesController@update')->name('admin.services.update');
    Route::delete('/services/{id}', 'ServicesController@destroy')->name('admin.services.destroy');

    Route::get('/mailinglist', 'MailingListController@index')->name('admin.mailinglist');
    Route::delete('/mailinglist/{id}', 'MailingListController@destroy')->name('admin.mailinglist.destroy');

    Route::get('/inbox', 'InboxController@index')->name('admin.inbox');
    Route::get('/inbox/{id}', 'InboxController@show')->name('admin.inbox.show');
    Route::delete('/inbox/{id}', 'InboxController@destroy')->name('admin.inbox.destroy');
    
    Route::get('/gallery', 'ContactController@index')->name('admin.gallery');
   

});
