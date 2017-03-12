<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/account/settings', 'AccountController@account');
Route::get('/account/password', 'AccountController@accountPassword');


Route::resource('survey','SurveyController');
Route::resource('responder','ResponderController');
Route::get('/responder/{id}/survey', 'ResponderController@ViewSurvey');



Route::get('/chart', function () {
    return view('chart');
});
