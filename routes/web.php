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


Route::middleware(['auth','auth.admin'])->group(function () {

  //vote
  Route::get('vote/{id}/stat', 'VoteController@stat');
  Route::get('vote/create', 'VoteController@create');
  Route::post('vote/create', 'VoteController@store');
  Route::get('vote/{id}/edit', 'VoteController@edit');
  Route::post('vote/{id}/edit', 'VoteController@update');
  Route::delete('vote/{id}/delete', 'VoteController@destroy');
  Route::delete('vote/{id}/clear', 'VoteController@clearResponse');
  Route::delete('question/{id}', 'QuestionController@destroy');

  //vote group
  Route::get('group/create', 'VoteGroupController@create');
  Route::post('group', 'VoteGroupController@store');
  Route::put('group/{id}', 'VoteGroupController@update');
  Route::delete('group/{id}', 'VoteGroupController@destroy');
  Route::get('group/{id}/addvote', 'VoteGroupController@selectvote');
  Route::post('group/{id}/addvote', 'VoteGroupController@addvote');
  Route::post('group/{id}/rmvote', 'VoteGroupController@rmvote');

  // resource
  Route::get('/resource/create', 'ResourceController@create');
  Route::post('/resource', 'ResourceController@store');
  Route::get('/resource/{resource}/edit', 'ResourceController@edit');
  Route::put('/resource/{resource}', 'ResourceController@update');
  Route::delete('/resource/{resource}', 'ResourceController@destroy');

  //auction
  Route::get('/auction/{auction}/start', 'AuctionRequestController@start_auction');

});

Route::middleware(['auth'])->group(function () {

  Route::get('/home', 'HomeController@index')->name('home');

  //vote
  Route::get('vote/group/{id}', 'VoteGroupController@show');
  Route::get('vote/all', 'VoteController@index');
  Route::get('vote/{id}', 'VoteController@show');
  Route::get('vote/{vote}/export', 'VoteController@export');
  Route::post('vote/{id}/submit', 'VoteController@submit');
  Route::get('vote/', 'VoteGroupController@index');

  //order room
  Route::get('order/room/', 'RoomOrderController@index');
  Route::get('order/room/{room}/{day}/{time}', 'RoomOrderController@update');
  Route::get('order/room/{room}/{day}/{time}/delete', 'RoomOrderController@delete');

  //orgs
  Route::get('/org/manage', 'OrganizationController@manage');
  Route::get('/org/{id}/resumes', 'OrganizationController@show_resumes');
  Route::get('/org/create', 'OrganizationController@create');
  Route::get('/org/{id}/edit', 'OrganizationController@edit');
  Route::post('/org/{id}', 'OrganizationController@store');
  Route::post('/org', 'OrganizationController@save');

  //resumes
  Route::get('/resume/control', 'ResumeController@control');
  Route::delete('/resume/delete/{id}', 'ResumeController@detach');

  //account profile
  Route::get('/account/profile', 'AccountController@profile_edit_show');
  Route::post('/account/profile', 'AccountController@profile_edit_store');

  //image processing
  Route::post('/avatar', 'FileController@post_avatar');
  Route::post('/org/{id}/avatar', 'FileController@post_org_avatar');
  Route::post('/image', 'FileController@post_image');
  Route::post('/file', 'FileController@post_file');
  Route::get('/file/{id}', 'FileController@get_file');

  // resource
  Route::get('/resource', 'ResourceController@index');
  Route::get('/resource/{resource}', 'ResourceController@show');
  Route::post('/resource/{resource}/reserve', 'ReservationController@store');

  //auction
  Route::post('/auction/bid', 'AuctionRequestController@store');

});

Route::middleware(['link_resume_to_user'])->group(function () {
  Route::get('/org/{id}/join', 'OrganizationController@join');
  Route::get('/resume', 'ResumeController@index');
  Route::post('/resume', 'ResumeController@save');
});

  Route::get('/', function (){
    return redirect('/vote/group/4');
  });
  Auth::routes();
  Route::get('/org', 'OrganizationController@index');
  Route::get('/org/search', 'OrganizationController@search');
  Route::get('/org/{id}', 'OrganizationController@show_feed');
  Route::get('/org/{id}/article', 'OrganizationController@show_article');
  Route::get('/org/{id}/discuss', 'OrganizationController@show_discuss');
  Route::get('/org/{id}/qa', 'OrganizationController@show_qa');
  Route::get('/org/{id}/todo', 'OrganizationController@show_todo');
  Route::get('/org/{id}/member', 'OrganizationController@show_member');
  Route::get('/org/{id}/about', 'OrganizationController@show_about');

Route::get('/image/{id}', 'FileController@get_image');
Route::get('/image/{id}/original', 'FileController@get_original_image');

Route::get('/auction', 'Auctioncontroller@index');
Route::get('/auction/{auction}', 'Auctioncontroller@show');
Route::get('/auction/{auction}/screen', 'Auctioncontroller@show_screen');

// Activate Account
Route::get('/activate', 'ActivateAccountController@index');
Route::post('/activate', 'ActivateAccountController@verify');

//public
// Route::get('/org/{id}/members', 'OrganizationController@members');
Route::post('/org/{id}/members/toggle', 'OrganizationController@toggle_member');
Route::get('/org/{id}/auths', 'OrganizationAuthenticationController@index');
Route::get('/org/{id}/auths/test', 'OrganizationAuthenticationController@create');
Route::get('/org/{orgid}/auths/{authid}', 'OrganizationAuthenticationController@show');

//private
Route::post('/org/{id}/auths/', 'OrganizationAuthenticationController@store');
Route::delete('/org/{id}/auths/', 'OrganizationAuthenticationController@destroy');
Route::post('/org/{id}/members/update', 'OrganizationController@change_authentication');

//User - public
Route::get('/u/my/calendar', 'UserController@show_mycalendar');
Route::get('/u/my/file', 'UserController@show_myfile');
Route::get('/u/my/image', 'UserController@show_myimage');
Route::get('/u/my', 'UserController@show_myhome');
Route::get('/u/{uid}', 'UserController@show');

//Article - public
Route::get('/article/test', 'ArticleController@test');
Route::post('/article', 'ArticleController@store');
Route::get('/article/create', 'ArticleController@create');
Route::delete('/article/{aid}', 'ArticleController@destroy');
Route::get('/article/{aid}', 'ArticleController@show');

// comment
Route::post('/article/attitude', 'ArticleController@attitude');
Route::post('/article/comment/attitude', 'CommentController@attitude');
Route::post('/article/comment', 'CommentController@store');
Route::get('/article/{id}/star', 'ArticleController@star');

//Global Home
// Route::get('/', 'HomeController@index');


// API
