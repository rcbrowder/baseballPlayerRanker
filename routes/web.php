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
    return view('index');
});

// Route::get('/batters', function () {
//     Route:: view('stats', 'StatsController@refactor');
// });
//
// Route::get('/pitchers', function () {
//     return view('stats', 'StatsController@refactor');
// });

Auth::routes();

Route::get('/home', 'StatsController@refactor')->name('home');

// Route::get('/test', 'MysportsfeedController@insertZscores');
Route::get('/stats', 'StatsController@refactor');


// Cheating to get data on Heroku without running job
Route::get('/apirequest', 'DataController@apiRequest');
Route::get('/parsestats', 'DataController@parseStats');
Route::get('/populatestats', 'DataController@populateStats');
Route::get('insertzscores', 'DataController@insertZscores');
