<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    protected $layout = 'layouts.main';
	public function index()
	{
		$blogs = Blog::with('author')->orderBy('created_at', 'desc')->take(10)->get();
		$events = Events::with('author')->orderBy('created_at', 'desc')->take(8)->get();
		$groups = Group::with('author')->orderBy('created_at', 'desc')->take(8)->get();
		$photos = Photo::with('author')->orderBy('created_at', 'desc')->take(8)->get();
		return View::make('home.index')
		->with('blogs', $blogs)
		->with('events', $events)
		->with('groups', $groups)
		->with('photos', $photos);
	}

}