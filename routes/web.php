<?php

// use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');
    // $user = $request->user();

    // $user->syncRoles('user');
    // $user->updatePermissions('add_users', 'delete_users', 'edit_users');
// });


// Auth::routes();
Route::get('/siteadmin/login', function(){
    return view('admin.login');
})->name('login.admin')->middleware('guest');
Route::post('siteadmin/login','Auth\LoginController@login')->name('login.admin');

Route::get('/login', function(){
    return view('login');
})->name('login')->middleware('guest');
Route::post('login','Auth\LoginUsersController@login')->name('login.users');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('/populars','User\FeedController@SidebarIndex');
Route::get('/feed', 'User\FeedController@indexFeed')->name('feeds.index');

Route::post('/addcomment','User\FeedController@addComment')->name('comment.store');
Route::post('/reply','User\FeedController@reply')->name('reply.store');

Route::post('/feed', 'User\FeedController@store')->name('feed.store');
Route::get('/feed/{feed}', 'User\FeedController@show')->name('feeds.show');

Route::get('feedcomment/{feedcomment}','User\FeedController@showUsercomment')->name('feedcomment.show');

Route::get('register-sukses/redirect',function(){
    return view('redirectSuccess');
})->name('redirectSuccess');
Route::get('register-gagal/redirect', function(){
    return view('redirectFailed');
})->name('redirectFailed');

// Route::get('cb/cb',function(){
//     return view('login');
// })->name('abcs');
Route::post('/','HomeController@storeGuest')->name('guest.store');
Route::get('/', 'HomeController@index')->name('guest.landing');

Route::get('guest/createfeed', 'User\FeedController@create')->middleware('auth', 'role:Murid,guest')->name('guest.createfeed');
Route::get('guest/profil', 'User\GuestController@showUser')->middleware('auth', 'role:Murid,guest')->name('guest.showuser');
Route::get('guest/showfeed','User\GuestController@showFeed')->middleware('auth', 'role:Murid,guest')->name('guest.showfeed');
Route::delete('hapus/feed/{feed}','User\GuestController@deleteFeed')->middleware('auth', 'role:Murid,guest')->name('guest.deletefeed');
Route::get('guest/showcomment','User\GuestController@showComment')->middleware('auth', 'role:Murid,guest')->name('guest.showcomment');
Route::delete('hapus/comment/{feedcomment}','User\GuestController@deleteComment')->middleware('auth', 'role:Murid,guest')->name('guest.deletecomment');
Route::get('guest/shownotification','User\GuestController@showNotification')->middleware('auth', 'role:Murid,guest')->name('guest.shownotification');

Route::get('tes/123','User\GuruController@index')->middleware('auth')->name('guru.index');
Route::post('tes/123','User\GuruController@loadDataAjax')->middleware('auth')->name('guru.loaddata');

// Route::get('tes/12','User\GuruController@indexs')->name('guru.indexs');
// Route::post('tes/12/load_data', 'User\GuruController@load_data')->name('loadmore.load_data');



//guru

Route::post('tes/123/post', 'User\GuruController@addPost')->name('guru.addpost');
Route::post('tes/123/status', 'User\GuruController@addStatus')->name('guru.addstatus');
Route::delete('tes/123/{id}', 'User\GuruController@deletePost')->name('guru.deletepost');
Route::put('tes/123/status/{id}', 'User\GuruController@updateStatus')->name('guru.updatestatus');
Route::put('tes/123/post/{id}', 'User\GuruController@updatePost')->name('guru.updatepost');
Route::get('tes/123/{id}/edit', 'User\GuruController@editPost')->name('guru.editpost');
Route::post('tes/123/comment', 'User\GuruController@addComment')->name('guru.addcomment');
Route::delete('tes/123/comment/{id}', 'User\GuruController@deleteComment')->name('guru.deletecomment');
Route::post('tes/123/loadcomment','User\GuruController@loadDataComment')->name('guru.loadcomment');





















// Route::resource('feed', 'User\FeedController');
// Route::get('home', function(){
//     return 'abc';
// })->name('feed.home');


// Route::get('home', function(){
//     'sukses';
// });


    //admin
// Route::get('/siteadmin/login', function(){
//     return view('admin.login');
// });

    //user
// Route::get('web/login', function(){
//     return view('user.templates.panel.login');
// });

















// Route::get('kamfer', function() {
//     return 'Admin Panel';
// })->middleware('role:admin');

// Route::get('kamfer/user', function() {
//     return 'Admin Edit User';
// })->middleware('role:admin,edit_users');
