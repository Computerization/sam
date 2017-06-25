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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth','auth.admin'])->group(function () {

  Route::get('vote/{id}/stat', 'VoteController@stat');

  Route::get('vote/create', 'VoteController@create');
  Route::post('vote/create', 'VoteController@store');

  Route::get('vote/{id}/edit', 'VoteController@edit');
  Route::post('vote/{id}/edit', 'VoteController@update');

  Route::delete('vote/{id}/delete', 'VoteController@destroy');
  Route::delete('vote/{id}/clear', 'VoteController@clearResponse');

  Route::delete('question/{id}', 'QuestionController@destroy');

});

Route::middleware('auth')->group(function () {

  Route::get('vote/{id}', 'VoteController@show');
  Route::post('vote/{id}/submit', 'VoteController@submit');
  Route::get('vote/', 'VoteController@index');

});
