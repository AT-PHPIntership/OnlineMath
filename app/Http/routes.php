<?php
/*
|--------------------------------------------------------------------------
| Admin dashboard Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['auth', 'roles'], 'namespace' => 'Backend', 'roles' => ['Admin']], function () {
        Route::resource('test', 'TestController');
         Route::resource('user', 'UserController');
        Route::resource('book', 'BookController');
        Route::resource('category', 'CategoryController', [
              'except' => ['destroy']
          ]);
          Route::resource('lesson', 'LessonController', [
                'except' => ['destroy']
            ]);
    });
});
Route::get('categories/data', ['uses' => 'Backend\CategoryController@categoryData', 'as' => 'categories.data']);
Route::delete('admin/category/{id?}', 'Backend\CategoryController@destroy');

Route::get('lessons/data', ['uses' => 'Backend\LessonController@lessonData', 'as' => 'lessons.data']);
Route::delete('admin/lesson/{id?}', 'Backend\LessonController@destroy');

/*
|--------------------------------------------------------------------------
| User dashboard Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => ['auth', 'roles'], 'namespace' => 'Frontend', 'roles' => ['user']], function () {
        Route::get('test/selection', ['uses' => 'SelectionTestController@getSelect', 'as' => 'test.selection']);
        Route::get('/exercise/test/{id}', ['uses' => 'SelectionTestController@getExercise', 'as' => 'test.exercise']);
        Route::post('exercise/test/{id}', ['uses' => 'SelectionTestController@postExercise', 'as' => 'test.exercise']);

        Route::get('lesson/choice', ['uses' => 'LearnMathController@getlesson', 'as' => 'lesson.choice']);
        Route::get('/learn/lesson/{id}', ['uses' => 'LearnMathController@gettestLesson', 'as' => 'test.lesson']);
        Route::post('learn/lesson/{id}', ['uses' => 'LearnMathController@posttestLesson', 'as' => 'test.lesson']);
    });
});

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
    return view('backend.layouts.master');
})->name('home');

Route::auth();
Route::get('/logout', ['uses' => 'Auth\SessionsController@logout', 'as' => 'logout']);
Route::get('/login', ['uses' => 'Auth\SessionsController@showLoginForm', 'as' => 'login']);
Route::post('/login', ['uses' => 'Auth\SessionsController@login', 'as' => 'auth.login']);
Route::get('/register', ['uses' => 'Auth\AuthController@showRegistrationForm', 'as' => 'register']);

Route::post('/register', ['uses' => 'Auth\AuthController@register', 'as' => 'auth.register']);
