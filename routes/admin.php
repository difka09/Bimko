<?php

// Route::get('jumlahguru','UserviewController@countGuru');
// Route::get('home', function(){
//     return view('admin.index');
// })->name('admin.index');


Route::get('/home', 'UserviewController@CountUser')->name('admin.index');

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


Route::put('user/reset/{user}', 'UserController@resetPassword')->name('user.reset');


//
// Route::get('/user', function(){
//     return 'user';
// });
