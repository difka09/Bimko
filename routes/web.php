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
Route::get('guest/profil', 'User\GuestController@showUser')->name('guest.showuser');
Route::get('guest/showfeed','User\GuestController@showFeed')->name('guest.showfeed');
Route::delete('hapus/feed/{feed}','User\GuestController@deleteFeed')->name('guest.deletefeed');
Route::get('guest/showcomment','User\GuestController@showComment')->name('guest.showcomment');
Route::delete('hapus/comment/{feedcomment}','User\GuestController@deleteComment')->name('guest.deletecomment');
Route::get('guest/shownotification','User\GuestController@showNotification')->name('guest.shownotification');

Route::get('tes/123',function(){
    return view('guru.notification');
});





















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
