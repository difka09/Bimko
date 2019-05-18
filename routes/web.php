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
Route::put('guest/profil/update','User\GuestController@updateUser')->middleware('auth', 'role:Murid,guest')->name('guest.updateprofil');
Route::get('guest/showfeed','User\GuestController@showFeed')->middleware('auth', 'role:Murid,guest')->name('guest.showfeed');
Route::delete('hapus/feed/{feed}','User\GuestController@deleteFeed')->middleware('auth', 'role:Murid,guest')->name('guest.deletefeed');
Route::get('guest/showcomment','User\GuestController@showComment')->middleware('auth', 'role:Murid,guest')->name('guest.showcomment');
Route::delete('hapus/comment/{feedcomment}','User\GuestController@deleteComment')->middleware('auth', 'role:Murid,guest')->name('guest.deletecomment');
Route::get('guest/shownotification','User\GuestController@showNotification')->middleware('auth', 'role:Murid,guest')->name('guest.shownotification');

Route::get('tes/123','User\GuruController@index')->middleware('auth')->name('guru.index');

// Route::get('tes/12','User\GuruController@indexs')->name('guru.indexs');
// Route::post('tes/12/load_data', 'User\GuruController@load_data')->name('loadmore.load_data');


//load
Route::post('tes/123','User\LoadController@loadDataAjax')->middleware('auth')->name('guru.loaddata');
Route::post('loadshow','User\LoadController@loadDataAjaxShow')->middleware('auth')->name('guru.loadshow');
Route::post('tes/123/loadcomment','User\LoadController@loadDataComment')->name('guru.loadcomment');
Route::post('tes/123/loadcommentshow','User\LoadController@loadDataCommentShow')->name('guru.loadcommentshow');


//guru
Route::post('tes/123/post', 'User\GuruController@addPost')->name('guru.addpost')->middleware('auth');
Route::post('tes/123/status', 'User\GuruController@addStatus')->name('guru.addstatus')->middleware('auth');
Route::delete('tes/123/{id}', 'User\GuruController@deletePost')->name('guru.deletepost')->middleware('auth');
Route::put('tes/123/status/{id}', 'User\GuruController@updateStatus')->name('guru.updatestatus')->middleware('auth');
Route::put('tes/123/post/{id}', 'User\GuruController@updatePost')->name('guru.updatepost')->middleware('auth');
Route::get('tes/123/{id}/edit', 'User\GuruController@editPost')->name('guru.editpost')->middleware('auth');
Route::post('tes/123/comment', 'User\GuruController@addComment')->name('guru.addcomment')->middleware('auth');
Route::delete('tes/123/comment/{id}', 'User\GuruController@deleteComment')->name('guru.deletecomment')->middleware('auth');
Route::get('tes/123/{post}', 'User\GuruController@showPost')->name('guru.show')->middleware('auth');
Route::get('tes/123/{post}/download','User\GuruController@download')->name('guru.download')->middleware('auth');


// tess
// Route::get('sa/sa','User\GuruController@searchFile')->name('guru.search');
Route::get('/feed/category/{id}', 'User\FeedController@category')->name('feed.category');
Route::get('/feed/a/cari','User\FeedController@search')->name('feed.search');

Route::post('tes/123/a/agenda/store', 'User\GuruController@addAgenda')->name('guru.addagenda')->middleware('auth');
Route::get('tes/123/a/agenda/','User\GuruController@indexAgenda')->name('guru.indexagenda');
Route::get('tes/123/a/agenda/{id}/show', 'User\GuruController@showAgenda')->name('guru.showagenda');
Route::put('tes/123/a/agenda/{id}/update', 'User\GuruController@updateAgenda')->name('guru.updateagenda');
Route::put('tes/123/a/agenda/{id}/updateAgendaList', 'User\GuruController@updateAgendaList')->name('guru.updateAgendaList');
Route::get('tes/123/a/agenda/{id}/download','User\GuruController@agendaDownload')->name('guru.agendadownload')->middleware('auth');
Route::delete('tes/123/a/agenda/{id}', 'User\GuruController@deleteAgenda')->name('guru.deleteagenda')->middleware('auth');


Route::post('notifications/read', 'NotificationController@markAsRead')->name('guru.notificationread');
Route::post('/notifications', 'NotificationController@notifications')->name('guru.notifications');
Route::get('/allnotifications', 'NotificationController@allNotifications')->name('guru.allnotifications');
Route::post('/allnotifications/read','NotificationController@allMarkAsRead')->name('guru.allnotificationread');

Route::get('tes/123/a/responder','User\GuruController@indexResponder')->name('guru.indexresponder');
Route::get('tes/123/a/responder/{id}/show', 'User\GuruController@showFeed')->name('guru.showresponder');
Route::put('tes/123/a/responder/{id}/update', 'User\GuruController@updateFeed')->name('guru.updatefeed');





// Route::get('test', function () {
//     event(new App\Events\StatusLiked('Someone',[2]));
//     return "Event has been sent!";
// });

Route::get('test/{id}', 'User\GuruController@tes');






//profil
Route::put('tes/123/edit/profil/update','User\GuruController@updateProfil')->name('guru.updateprofil')->middleware('auth');
Route::get('tes/123/edit/profil','User\GuruController@editProfil')->name('guru.editprofil')->middleware('auth');
Route::get('tes/123/profil/{user}', 'User\GuruController@showProfil')->name('guru.profil')->middleware('auth');

Route::get('tes/123/a/files','User\FileController@filePage')->name('guru.filepage')->middleware('auth');
// Route::get('tes/123/a/filesa','User\FileController@searchFile')->name('guru.search')->middleware('auth');
// Route::get('tes/123/a/files','User\FileController@search')->name('guru.s')->middleware('auth');
Route::get('search/people','User\FileController@searchPeople')->name('guru.searchpeople');
Route::get('sa/date','User\FileController@sortbyDate')->name('guru.sortbydate')->middleware('auth');
Route::get('sa/abjad','User\FileController@sortbyAbjad')->name('guru.sortbyabjad')->middleware('auth');



















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
