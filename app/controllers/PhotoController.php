<?php
class PhotoController extends BaseController
{
	protected $layout = 'layouts.main';
	public function index()
	{
		$photos = Photo::with('author')->orderBy('created_at', 'desc')->paginate(20);
		return View::make('photo.index')->with('photos', $photos);
	}
	public function addGet()
	{
		// get the current user
		$user = Auth::user();
		// show the create post form, and send
		// the current user to identify the post author
		return View::make('photo.add')->with('user', $user);

	}
	public function addPost()
	{
		// let's setup some rules for our new data
		// I'm sure you can come up with better ones
		$rules = array(
		'title' 	=> 'required|min:3|max:128',
		'file' => 'mimes:jpg,gif,png'	
		);
		$pictrue = '';
		$title = Input::get('title');
		$description = Input::get('description');
		$author_id =Input::get('author_id');
		$tags =Input::get('tags');
		if (Input::hasFile('file'))
		{
			$file = Input::file('file');
			$ext = $file->guessClientExtension();
			$filename = $file->getClientOriginalName();
			$file->move(public_path().'/data', md5(date('YmdHis').$filename).'.'.$ext);
			$pictrue = md5(date('YmdHis').$filename).'.'.$ext;
		}
		$new_photo = array(
		'title' 	=> $title,
		'description' 	=> $description,
		'author_id' => $author_id,
		'views' => 0,
		'pictrue'   => $pictrue,
		'tags'   => $tags
		);
		$v = Validator::make($new_photo, $rules);

		if ( $v->fails() )
		{
			// redirect back to the form with
			// errors, input and our currently
			// logged in user
			return Redirect::to('photo/add')
			->with('user', Auth::user())
			->withErrors($v)
			->withInput();
		}


		// create the new post
		$photo = new Photo($new_photo);
		$photo->save();
		// redirect to viewing our new post
		return Redirect::to('photo/view/'.$photo->id);




	}

	public function editGet($id)
	{
		$user = Auth::user();
		$photo = Photo::find($id);
		return View::make('photo.edit')->with('photo', $photo);
	}
	public function editPost($id)
	{
		$user = Auth::user();

		$photo = Photo::find($id);
		if($user->id != $photo->author->id)
		{
			return View::make('photo.view')
			->with('photo', $photo);
		}
		// let's setup some rules for our new data
		// I'm sure you can come up with better ones
		$rules = array(
		'title' 	=> 'required|min:3|max:128',
		'file' => 'mimes:jpg,gif,png'	
		);
		$pictrue = '';
		$title = Input::get('title');
		$description = Input::get('description');
		$author_id =Input::get('author_id');
		$tags =Input::get('tags');
		if (Input::hasFile('file'))
		{
			$file = Input::file('file');
			$ext = $file->guessClientExtension();
			$filename = $file->getClientOriginalName();
			$file->move(public_path().'/data', md5(date('YmdHis').$filename).'.'.$ext);
			$pictrue = md5(date('YmdHis').$filename).'.'.$ext;
		}
		$new_photo = array(
		'title' 	=> $title,
		'description' 	=> $description,
		'author_id' => $author_id,
		'views' => 0,
		'pictrue'   => $pictrue,
		'tags'   => $tags
		);
		$v = Validator::make($new_photo, $rules);

		if ( $v->fails() )
		{
			// redirect back to the form with
			// errors, input and our currently
			// logged in user
			return Redirect::to('photo/add')
			->with('user', Auth::user())
			->withErrors($v)
			->withInput();
		}

		$photo->title = $title;
		$photo->description = $description;
		$photo->author_id = $author_id;
		$photo->tags = $tags;
		if(!empty($pictrue)) $photo->pictrue = $pictrue;
		$photo->save();

		// redirect to viewing our new post
		return Redirect::to('photo/view/'.$photo->id);

	}

	public function view($id)
	{
		// get our post, identified by the route
		// parameter
		$photo = Photo::find($id);
		$photo->views += 1;
		$photo->save();
		// show the full view, and pass the post
		// we just aquired
		return View::make('photo.view')
		->with('photo', $photo);
	}
}