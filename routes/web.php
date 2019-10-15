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
/*Route::get('welcome', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('index');
});
Route::get('index', function () {
    return view('index');
});
Route::get('register', function () {
    return view('register');
});
Route::get('login', function () {
    return view('login');
});
Route::get('list', function () {
    return view('List');
});
Route::get('games/spacecube', function () {
    return view('games/spacecube');
});
Route::post('/signup', 'regist@show')->name('SignUp');
Route::post('/signin', 'logi@show')->name('SignIn');
Route::post('/emailcheck', 'check_regist_ajax@showEmail')->name('Emailcheck');
Route::post('/usernamecheck', 'check_regist_ajax@showUsername')->name('Usernamecheck');
Route::post('/gethighscore', 'highscore@getConntent')->name('getHighScore');
Route::get('/highscore', 'highscore@getGames');
/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
