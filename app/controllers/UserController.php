<?php
class UserController extends BaseController
{
	protected $layout = 'layouts.main';
	public function index()
	{
		return View::make('user.index');
	}

	public function loginGet()
	{

		return View::make('user.login');
	}
	public function loginPost()
	{

		// get the username and password from the POST
		// data using the Input class

		$email = Input::get('email');
		$password = Input::get('password');
		// call Auth::attempt() on the username and password
		// to try to login, the session will be created
		// automatically on success
		//$credentials = array('username' => $username, 'password' => $password, 'remember' => true);
		$credentials = array('email' => $email, 'password' => $password);
		if(Auth::attempt($credentials))
		{
			// it worked, redirect to the admin route
			return Redirect::to('/');
		}
		else
		{
			// login failed, show the form again and
			// use the login_errors data to show that
			// an error occured
			return Redirect::to('login')
			->with('login_errors', true);
		}

	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function registerGet()
	{

		return View::make('user.register');

	}
	public function registerPost()
	{

		// get the username and password from the POST
		// data using the Input class
		$username = Input::get('username');
		$email = Input::get('email');
		$password = Input::get('password');
		$role = 1;
		$active = true;
		if(empty($username) || empty($password))
		{
			return Redirect::to('register')
			->with('register_errors', true);
		}else{
			$arr = array(
		    'username' => $username,
		    'email'    => $email,
		    'password' => Hash::make($password),
		    'role'     => $role,
		    'active'   => $active
			);
			$rules = array(
		'username' 	=> 'unique:users,username|required|min:1|max:20',
		'password' 	=> 'required',
		'email' 		=> 'unique:users,email|required'		
		);

		// make the validator
		$v = Validator::make($arr, $rules);

		if ( $v->fails() )
		{
			// redirect back to the form with
			// errors, input and our currently
			// logged in user
			return Redirect::to('register')
			->with('user', Auth::user())
			->withErrors($v)
			->withInput();
		}
		$user = new User();
		$user->fill($arr);
		$result = $user->save();
		// call Auth::attempt() on the username and password
		// to try to login, the session will be created
		// automatically on success

		if($result)
		{
			if(Auth::attempt(array(	'email' => $email,	'password' => $password)))
			{
				// it worked, redirect to the admin route
				return Redirect::to('/');
			}
			else
			{
				// login failed, show the form again and
				// use the login_errors data to show that
				// an error occured
				return Redirect::to('login')
				->with('login_errors', true);
			}
		}
		else
		{
			return Redirect::to('register')
			->with('register_errors', true);
		}
		}

	}

	public function settingGet($id)
	{
		$current_user = Auth::user();
		$user = User::find($id);
		if($current_user->id != $user->id)
		{
			return Redirect::to('/');
		}
		return View::make('user.setting')->with('user', $user);
	}
	public function settingPost($id)
	{
		$current_user = Auth::user();
		$user = User::find($id);
		$username = Input::get('username');
		$rules = array(
		         'username' 	=> 'unique:users,username|required|min:1|max:20',
		);

		if($current_user->id != $user->id)
		{
			return Redirect::to('/');
		}
		if($username == $user->username )
		{
			return Redirect::to('user/setting/'.$id);
		}

		// get the username and password from the POST
		// data using the Input class


		if(empty($username))
		{
			return Redirect::to('user/setting/'.$id)
			->with('setting_errors', true);
		}else{
			$arr = array(
		    'username' => $username,

			);
				
			// make the validator
			$v = Validator::make($arr, $rules);

			if ( $v->fails() )
			{
				return Redirect::to('user/setting/'.$id)
				->with('user', Auth::user())
				->withErrors($v)
				->withInput();
			}
			$user->fill($arr);
			$result = $user->save();

			return View::make('user.setting')->with('user', $user);
		}

	}

	public function home($id)
	{
		$current_user = Auth::user();
		$user = User::find($id);
		if($current_user->id != $user->id)
		{
			return Redirect::to('/');
		}
		return View::make('user.home')->with('user', $user);
	}
}