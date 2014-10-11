<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/test', function(){

});

// Route::group(array('prefix' => 'settings', 'before' => 'auth'), function()
// {
//     Route::get('/profile', array('as' => 'profile', 'uses' => 'UserController@profile'));
//     // Route::post('/profile/save', array('as' => 'profile/save', 'uses' => 'SettingController@save'));
    
// });

Route::group(array('prefix' => 'settings'), function()
{
    Route::get('/profile', array('as' => 'profile', 'uses' => 'UserController@profile'));
    // Route::post('/profile/save', array('as' => 'profile/save', 'uses' => 'SettingController@save'));
    
});

Route::resource('photo', 'UserController');

Route::get('/courses', array('as'=>'courses', 'uses'=>'PageController@loadCourseSelection'));