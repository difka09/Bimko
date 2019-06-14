<?php

Route::get('/home', 'UserviewController@CountUser')->name('admin.index');
Route::get('import', 'ImportController@indexImport')->name('admin.import');
Route::post('import/storemurid', 'ImportController@storeMurid')->name('admin.importstoremurid');
Route::post('import/storeguru', 'ImportController@storeGuru')->name('admin.importstoreguru');

Route::resource('/user', 'UserController');

Route::resource('/school', 'SchoolController');

Route::get('/trash', 'UserController@viewTrash')->name('user.trash');
Route::get('/trash/restoreall', 'UserController@restoreAll')->name('user.restoreall');
Route::get('/trash/restore/{id}', 'UserController@restoreTrash')->name('user.restore');
Route::get('/trash/destroypermanent/{id}','UserController@destroyPermanent')->name('user.destroypermanent');
Route::get('/trash/show/{id}', 'UserController@trashShow')->name('user.trash.show');

Route::get('/guru','UserviewController@indexGuru')->name('user.guru');
Route::get('/guru/create','UserviewController@createGuru')->name('user.guru.create');
Route::post('/guru','UserviewController@storeGuru')->name('user.guru.store');


Route::get('/murid','UserviewController@indexMurid')->name('user.murid');
Route::get('/murid/create','UserviewController@createMurid')->name('user.murid.create');
Route::post('/murid','UserviewController@storeMurid')->name('user.murid.store');

Route::get('/guest','UserviewController@indexGuest')->name('user.guest');
Route::get('/guest/create','UserviewController@createGuest')->name('user.guest.create');
Route::post('/guest','UserviewController@storeGuest')->name('user.guest.store');

Route::get('/categories','UserviewController@indexCategory')->name('category.index');
Route::get('/categories/create','UserviewController@createCategory')->name('user.category.create');
Route::get('/categories/{category}','UserviewController@editCategory')->name('category.edit');
Route::put('/categories/{category}','UserviewController@updateCategory')->name('category.update');
Route::delete('/categories/{category}','UserviewController@destroyCategory')->name('category.destroy');
Route::post('/categories','UserviewController@storeCategory')->name('user.category.store');

Route::put('user/reset/{user}', 'UserController@resetPassword')->name('user.reset');

Route::get('download/xlsmurid',function(){
    $download = public_path() .'/fileku/muridxls.xlsx';
    return response()->download($download);
})->name('admin.xlsmurid');

Route::get('download/xlsguru',function(){
    $download = public_path() .'/fileku/guruxls.xlsx';
    return response()->download($download);
})->name('admin.xlsguru');

Route::get('export/school', 'ImportController@export')->name('admin.export');
Route::put('changepassword', 'UserviewController@changePassword')->name('admin.changepassword');
