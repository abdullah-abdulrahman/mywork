Route::get('/services', 'ServicesController@index')->name('admin.services');
Route::get('/services/create', 'ServicesController@create')->name('admin.services.create');
Route::post('/services', 'ServicesController@store')->name('admin.services.store');
Route::get('/services/{id}/edit', 'ServicesController@edit')->name('admin.services.edit');
Route::patch('/services/{id}', 'ServicesController@update')->name('admin.services.update');
Route::delete('/services/{id}', 'ServicesController@destroy')->name('admin.services.destroy');