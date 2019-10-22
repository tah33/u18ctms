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
Auth::routes();
Route::group(['middleware' => ['web','auth']], function(){


 Route::get('/', function() {
    if (Auth::user()->role == 'admin') {
      return view('welcome');
    } 
    else {
      return view('manager.manager');
    } 
  });
Route::get('/accounts', 'HomeController@show');
Route::get('/delete-user/{id}', 'HomeController@destroy');
Route::get('view-user/{id}','HomeController@view');
Route::get('edit-user/{id}','HomeController@edit');
Route::post('update-user/{id}','HomeController@update');
Route::get('profile','HomeController@profile');
Route::get('edit-profile/{id}','HomeController@editprofile');
Route::post('update-profile/{id}','HomeController@updateprofile');

Route::get('/team', 'TeamController@create');
Route::post('/save-team', 'TeamController@store');
Route::get('/teams', 'TeamController@show');
Route::get('/edit-team/{teams_id}', 'TeamController@edit');
Route::post('/update-team/{teams_id}', 'TeamController@update');
Route::get('/delete-team/{teams_id}', 'TeamController@destroy');
Route::get('/view-team/{teams_id}', 'TeamController@view');
Route::get('/manager', 'TeamController@index');

Route::get('/add-player', 'PlayerController@create');
Route::post('/save-player', 'PlayerController@store');
Route::get('/players', 'PlayerController@show');
Route::get('view-player/{id}', 'PlayerController@index');
Route::get('/edit-player/{id}', 'PlayerController@edit');
Route::post('/update-player/{id}', 'PlayerController@update');
Route::get('/delete-player/{id}', 'PlayerController@destroy');
Route::post('/search-player', 'PlayerController@search');
Route::get('/captain/{id}', 'PlayerController@captain');


Route::get('/add-venue', 'VenueController@create');
Route::post('/save-venue', 'VenueController@store');
Route::get('/venues', 'VenueController@show');
Route::get('/demo', 'VenueController@index');


Route::get('/add-match', 'MatchController@create');
Route::post('/save-match', 'MatchController@store');
Route::get('/matches', 'MatchController@show');
Route::get('/edit-match/{id}', 'MatchController@edit');
Route::post('/update-match/{id}', 'MatchController@update');
Route::get('/delete-match/{id}', 'MatchController@destroy');

Route::get('fees','FeeController@show');
Route::get('edit-fee/{fees_id}','FeeController@edit');
Route::post('update-fine/{fees_id}','FeeController@update');
Route::get('due/{id}','FeeController@create');
Route::post('update-dues/{fees_id}','FeeController@store');
Route::get('fee','FeeController@view');

Route::get('run','RunController@create');
Route::post('save-run','RunController@store');
Route::get('runs','RunController@show');
Route::get('view-run','RunController@index');

Route::get('results','ResultController@show');
Route::get('result','ResultController@index');
Route::get('match-result','ResultController@store');

Route::get('points','PointController@show');
Route::get('point','PointController@index');

Route::get('pdf-fee','PDFController@fee');
Route::get('pdf-match','PDFController@match');
Route::get('pdf-player','PDFController@player');
Route::get('pdf-point','PDFController@point');
Route::get('pdf-result','PDFController@result');
Route::get('pdf-run','PDFController@run');
Route::get('pdf-match-result','PDFController@results');

});