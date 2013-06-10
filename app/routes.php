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

Route::get('/', 'HomeController@index');

//文章
Route::get('blog', 'BlogController@index');
Route::get('blog/all', 'BlogController@index');
Route::get('blog/view/{id}', 'BlogController@view')->where('id', '[0-9]+');
Route::get('blog/add', array('before' => 'auth', 'uses' => 'BlogController@addGet'));
Route::post('blog/add', array('before' => 'auth', 'uses' =>'BlogController@addPost'));
Route::get('blog/edit/{id}', array('before' => 'auth', 'uses' => 'BlogController@editGet'))->where('id', '[0-9]+');
Route::post('blog/edit/{id}', array('before' => 'auth', 'uses' => 'BlogController@editPost'))->where('id', '[0-9]+');

//用户
Route::get('login', 'UserController@loginGet');
Route::post('login', 'UserController@loginPost');
Route::get('register', 'UserController@registerGet');
Route::post('register', 'UserController@registerPost');
Route::get('user/setting/{id}', array('before' => 'auth', 'uses' => 'UserController@settingGet'))->where('id', '[0-9]+');
Route::post('user/setting/{id}',array('before' => 'auth',  'uses' => 'UserController@settingPost'))->where('id', '[0-9]+');
Route::get('user/home/{id}', array('before' => 'auth', 'uses' => 'UserController@home'))->where('id', '[0-9]+');
Route::get('logout', array('before' => 'auth', 'uses' => 'UserController@logout'));

//图片
Route::get('photo', 'PhotoController@index');
Route::get('photo/all', 'PhotoController@index');
Route::get('photo/add', array('before' => 'auth', 'uses' => 'PhotoController@addGet'));
Route::post('photo/add', array('before' => 'auth', 'uses' =>'PhotoController@addPost'));
Route::get('photo/edit/{id}', array('before' => 'auth', 'uses' => 'PhotoController@editGet'))->where('id', '[0-9]+');
Route::post('photo/edit/{id}', array('before' => 'auth', 'uses' => 'PhotoController@editPost'))->where('id', '[0-9]+');
Route::get('photo/view/{id}', 'PhotoController@view')->where('id', '[0-9]+');

//活动
Route::get('events', 'EventsController@index');
Route::get('events/all', 'EventsController@index');
Route::get('events/view/{id}', 'EventsController@view')->where('id', '[0-9]+');
Route::get('events/add', array('before' => 'auth', 'uses' => 'EventsController@addGet'));
Route::post('events/add', array('before' => 'auth', 'uses' =>'EventsController@addPost'));
Route::get('events/edit/{id}', array('before' => 'auth', 'uses' => 'EventsController@editGet'))->where('id', '[0-9]+');
Route::post('events/edit/{id}', array('before' => 'auth', 'uses' => 'EventsController@editPost'))->where('id', '[0-9]+');
Route::get('events/jion/{id}', array('before' => 'auth', 'uses' => 'EventsController@jion'))->where('id', '[0-9]+');
Route::get('events/leave/{id}', array('before' => 'auth', 'uses' => 'EventsController@leave'))->where('id', '[0-9]+');
//群组
Route::get('group', 'GroupController@index');
Route::get('group/all', 'GroupController@index');
Route::get('group/view/{id}', 'GroupController@view')->where('id', '[0-9]+');
Route::get('group/add', array('before' => 'auth', 'uses' => 'GroupController@addGet'));
Route::post('group/add', array('before' => 'auth', 'uses' =>'GroupController@addPost'));
Route::get('group/edit/{id}', array('before' => 'auth', 'uses' => 'GroupController@editGet'))->where('id', '[0-9]+');
Route::post('group/edit/{id}', array('before' => 'auth', 'uses' => 'GroupController@editPost'))->where('id', '[0-9]+');
Route::get('group/jion/{id}', array('before' => 'auth', 'uses' => 'GroupController@jion'))->where('id', '[0-9]+');
Route::get('group/leave/{id}', array('before' => 'auth', 'uses' => 'GroupController@leave'))->where('id', '[0-9]+');