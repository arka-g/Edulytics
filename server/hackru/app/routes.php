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

Route::group(array('prefix' => 'courses'), function()
{
	Route::get('/', array('as'=>'courses', 'uses'=>'PageController@loadCourseSelection'));
	Route::post('/save', array('as' => 'courses-add', 'uses' => 'PageController@saveCourseSelection'));
	Route::get('/{course}/grades', array('uses'=>'PageController@loadCoursePage'));	
	Route::get('/assessment/{course}', array('uses' => 'PageController@loadAssessment'));
});
Route::post('/assessment/save1', array('as'=>'assessment-add','uses'=>'PageController@addAssessment'));

Route::get('/assessment/{course}', array('uses' => 'PageController@loadAddGrade'));
Route::get('/markweight', array('uses' => 'UserController@loadCourseMarkAndWeight'));
// Route::get('/courses', array('as'=>'courses', 'uses'=>'PageController@loadCourseSelection'));
// Route::post('/courses/save', array('as' => 'courses-add', 'uses' => 'PageController@saveCourseSelection'));
// Route::get('/courses/{course}/grades', array('uses'=>'PageController@loadCoursePage'));
// Route::post('/course/assessment/add', array('as' => 'assessment-add', 'uses' => 'PageController@'))




