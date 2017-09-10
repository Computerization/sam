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

Route::get('/', function() {
  return redirect()->action('OrganizationController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


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

});

Route::middleware('auth')->group(function () {

  //vote
  Route::get('vote/{id}', 'VoteController@show');
  Route::post('vote/{id}/submit', 'VoteController@submit');
  Route::get('vote/', 'VoteController@index');

  //vote group
  Route::get('group/{id}', 'VoteGroupController@show');
  Route::get('group/', 'VoteGroupController@index');

  //order room
  Route::get('order/room/', 'RoomOrderController@index');
  Route::get('order/room/{time}/{room}', 'RoomOrderController@process');

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
  Route::post('/image', 'FileController@post_image');
  Route::post('/file', 'FileController@post_file');
  Route::get('/image/{id}', 'FileController@get_image');
  Route::get('/file/{id}', 'FileController@get_file');

});

Route::middleware(['link_resume_to_user'])->group(function () {
  Route::get('/org/{id}/join', 'OrganizationController@join');
  Route::get('/resume', 'ResumeController@index');
  Route::post('/resume', 'ResumeController@save');
});

Route::get('/org', 'OrganizationController@index');

Route::get('/org/{id}', 'OrganizationController@show');
