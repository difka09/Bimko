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


// admin only
Route::get('/siteadmin/login', function(){
    return view('admin.login');
})->name('login.admin')->middleware('guest');
Route::post('siteadmin/login','Auth\LoginController@login')->name('login.admin');

// without auth
Route::post('/','HomeController@storeGuest')->name('guest.store');
Route::get('/', 'HomeController@index')->name('guest.landing');
Route::post('login/guru','Auth\LoginUsersController@login')->name('login.userguru');
Route::post('login/murid','Auth\LoginMuridController@login')->name('login.usermurid');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register-sukses/redirect',function(){
    return view('redirectSuccess');
})->name('redirectSuccess');
Route::get('register-gagal/redirect', function(){
    return view('redirectFailed');
})->name('redirectFailed');

Route::get('/login', function(){
    return view('login');
})->name('login')->middleware('guest');
Route::get('/register', function(){
    return view('register');
})->name('register')->middleware('guest');


// show feed by index, categories, search
Route::get('/feed', 'User\FeedController@indexFeed')->name('feeds.index');
Route::get('/feed/category/{id}', 'User\FeedController@category')->name('feed.category');
Route::get('/feed/a/cari','User\FeedController@search')->name('feed.search');
Route::get('feed/tentang-kami','User\FeedController@info')->name('feed.info');

// comment and reply
Route::post('/addcomment','User\FeedController@addComment')->name('comment.store');
Route::post('/reply','User\FeedController@reply')->name('reply.store');
Route::get('feedcomment/{feedcomment}','User\FeedController@showUsercomment')->name('feedcomment.show');
// show
Route::get('/feed/{feed}', 'User\FeedController@show')->name('feeds.show');
// create feed
Route::post('/feed', 'User\FeedController@store')->name('feed.store');

// dashboard guest
Route::get('guest/createfeed', 'User\FeedController@create')->middleware('auth', 'role:guest')->name('guest.createfeed');
Route::get('guest/profil', 'User\GuestController@showUser')->middleware('auth', 'role:guest')->name('guest.showuser');
Route::put('guest/profil/update','User\GuestController@updateUser')->middleware('auth', 'role:guest')->name('guest.updateprofil');
Route::get('guest/showfeed','User\GuestController@showFeed')->middleware('auth', 'role:guest')->name('guest.showfeed');
Route::delete('hapus/feed/{feed}','User\GuestController@deleteFeed')->middleware('auth', 'role:guest')->name('guest.deletefeed');
Route::get('guest/showcomment','User\GuestController@showComment')->middleware('auth', 'role:guest')->name('guest.showcomment');
Route::delete('hapus/comment/{feedcomment}','User\GuestController@deleteComment')->middleware('auth', 'role:guest')->name('guest.deletecomment');
Route::get('guest/shownotification','User\GuestController@showNotification')->middleware('auth', 'role:guest')->name('guest.shownotification');

// dashboard murid
Route::get('murid/createquestion', 'User\MuridController@createQuestion')->middleware('auth', 'role:Murid')->name('murid.createquestion');
Route::get('murid/profil', 'User\MuridController@showUser')->middleware('auth', 'role:Murid')->name('murid.showuser');
Route::put('murid/profil/update','User\MuridController@updateUser')->middleware('auth', 'role:Murid')->name('murid.updateprofil');
Route::get('murid/show/{question}','User\MuridController@showQuestion')->middleware('auth', 'role:Murid')->name('murid.showquestion');
Route::get('murid/daftar-pesan','User\MuridController@listQuestion')->middleware('auth', 'role:Murid')->name('murid.listquestion');
Route::delete('hapus/question/{question}','User\MuridController@deleteQuestion')->middleware('auth', 'role:Murid')->name('murid.deletequestion');
Route::get('murid/showcomment','User\MuridController@showComment')->middleware('auth', 'role:Murid')->name('murid.showcomment');
Route::delete('hapus/comment/{feedcomment}','User\MuridController@deleteComment')->middleware('auth', 'role:Murid')->name('murid.deletecomment');
Route::get('murid/shownotification','User\MuridController@showNotification')->middleware('auth', 'role:Murid')->name('murid.shownotification');
Route::post('murid1/post','User\MuridController@addQuestion')->middleware('auth', 'role:Murid')->name('murid.addquestion');
Route::post('murid2/post','User\MuridController@addmoreQuestion')->middleware('auth', 'role:Murid')->name('murid.addmorequestion');

// dashboard guru
Route::get('tes/123','User\GuruController@index')->middleware('auth','role:Guru')->name('guru.index');
//load
Route::post('tes/123','User\LoadController@loadDataAjax')->middleware('auth')->name('guru.loaddata');
Route::post('loadshow','User\LoadController@loadDataAjaxShow')->middleware('auth')->name('guru.loadshow');
Route::post('tes/123/loadcomment','User\LoadController@loadDataComment')->name('guru.loadcomment');
Route::post('tes/123/loadcommentshow','User\LoadController@loadDataCommentShow')->name('guru.loadcommentshow');
//guru core
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
// agenda
Route::post('tes/123/a/agenda/store', 'User\GuruController@addAgenda')->name('guru.addagenda')->middleware('auth');
Route::post('tes/123/a/agenda/detailstore', 'User\GuruController@AddDetail')->name('guru.AddDetail')->middleware('auth');
Route::get('tes/123/a/agenda/','User\GuruController@indexAgenda')->name('guru.indexagenda')->middleware('auth');
Route::get('tes/123/a/agenda/{id}/show', 'User\GuruController@showAgenda')->name('guru.showagenda')->middleware('auth');
Route::put('tes/123/a/agenda/{id}/update', 'User\GuruController@updateAgenda')->name('guru.updateagenda')->middleware('auth');
Route::put('tes/123/a/agenda/{id}/updateAgendaList', 'User\GuruController@updateAgendaList')->name('guru.updateAgendaList')->middleware('auth');
Route::get('tes/123/a/agenda/{id}/download','User\GuruController@agendaDownload')->name('guru.agendadownload')->middleware('auth');
Route::delete('tes/123/a/agenda/{id}', 'User\GuruController@deleteAgenda')->name('guru.deleteagenda')->middleware('auth');
// notifications
Route::post('notifications/read', 'NotificationController@markAsRead')->name('guru.notificationread');
Route::post('/notifications', 'NotificationController@notifications')->name('guru.notifications');
Route::get('/allnotifications', 'NotificationController@allNotifications')->name('guru.allnotifications');
Route::post('/allnotifications/read','NotificationController@allMarkAsRead')->name('guru.allnotificationread');
// request responder
Route::get('tes/123/a/responder','User\GuruController@indexResponder')->name('guru.indexresponder');
Route::get('tes/123/a/responder/{id}/show', 'User\GuruController@showFeed')->name('guru.showresponder');
Route::put('tes/123/a/responder/{id}/update', 'User\GuruController@updateFeed')->name('guru.updatefeed');
// request pesan konseling
Route::post('tes/123/a/pesan-konseling/{id}/show', 'User\GuruController@showQuestion')->name('guru.showmurid');
Route::get('tes/123/a/pesan-konseling','User\GuruController@indexMurid')->name('guru.indexmurid');
Route::put('tes/123/a/pesan-konseling/{id}/update','User\GuruController@updatePesan')->name('guru.updatequestion');
Route::post('tes/123/a/pesan-konseling/show/{id}','User\LoadController@showQuestion')->name('guru.showquestion');
Route::post('tes/123/a/pesan-konseling/post','User\GuruController@addAnswer')->name('guru.addanswer');
//profil
Route::put('tes/123/edit/profil/update','User\GuruController@updateProfil')->name('guru.updateprofil')->middleware('auth');
Route::get('tes/123/edit/profil','User\GuruController@editProfil')->name('guru.editprofil')->middleware('auth');
Route::get('tes/123/profil/{user}', 'User\GuruController@showProfil')->name('guru.profil')->middleware('auth');
Route::get('tes/123/profil')->name('guru.profilurl')->middleware('auth');
// filepage and search and sortir
Route::get('tes/123/a/files','User\FileController@filePage')->name('guru.filepage')->middleware('auth');
Route::get('search/people','User\FileController@searchPeople')->name('guru.searchpeople')->middleware('auth');
Route::get('sa/date','User\FileController@sortbyDate')->name('guru.sortbydate')->middleware('auth');
Route::get('sa/abjad','User\FileController@sortbyAbjad')->name('guru.sortbyabjad')->middleware('auth');










// Route::get('tes/123/a/filesa','User\FileController@searchFile')->name('guru.search')->middleware('auth');
// Route::get('tes/123/a/files','User\FileController@search')->name('guru.s')->middleware('auth');

// event
// Route::get('test', function () {
//     event(new App\Events\StatusLiked('Someone',[2]));
//     return "Event has been sent!";
// });

// tes
// Route::get('/web/tes/', 'User\GuruController@tes');

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
