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
use App\Task;
use Illuminate\Http\Request;

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

//Route::get('tasks/search', function(Request $request){
	//$input = $request->all(); //doesn't work
	//Task::create($input); //doesn't work
    //    dd($input); //doesn't work

	
	//$tasks = Task::where('title', 'LIKE', '%price check%')->get(); //this works
	//$tasks = Task::search('test4', null, true)->get();; //this works
	

	//$tasks = Task::search('select title from tasks where title LIKE %matha%') //this works
	//->with('user')
	//->get();
	//dd($tasks);

//});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('tasks/search', 'TasksController@search');
Route::post('/questions', 'TasksController@showSearch');
Route::resource('tasks', 'TasksController');

Route::get('profile', 'TasksController@userprofile');

Route::post('/like/{myPostId}', 'TasksController@upvoted');
Route::post('/dislike/{myPostIdtwo}', 'TasksController@downvoted');