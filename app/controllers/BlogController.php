<?php
class BlogController extends BaseController
{
	protected $layout = 'layouts.main';
	public function index()
	{
		//博客首页
		$blogs = Blog::with('author')->orderBy('created_at', 'desc')->paginate(20);
		return View::make('blog.index')->with('blogs', $blogs);
	}
	public function addGet()
	{
		// get the current user
		$user = Auth::user();
		// show the create post form, and send
		// the current user to identify the post author
		return View::make('blog.add')->with('user', $user);

	}
	public function addPost()
	{
		// let's setup some rules for our new data
		// I'm sure you can come up with better ones
		$rules = array(
		'title' 	=> 'required|min:3|max:128',
		'content' 		=> 'required',	
		'file' => 'mimes:jpg,gif,png'	
		);
		$pictrue = '';
		$title = Input::get('title');
		$content = Input::get('content');
		$description = Input::get('title');
		if(empty($description)) $description = substr($content,0, 120);
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
		$new_blog = array(
		'title' 	=> $title,
		'description' 	=> $description,
		'content' 		=> $content,
		'author_id' => $author_id,
		'views' => 0,
		'pictrue'   => $pictrue,
		'tags'   => $tags
		);
		$v = Validator::make($new_blog, $rules);

		if ( $v->fails() )
		{
			// redirect back to the form with
			// errors, input and our currently
			// logged in user
			return Redirect::to('blog/add')
			->with('user', Auth::user())
			->withErrors($v)
			->withInput();
		}


		// create the new post
		$blog = new Blog($new_blog);
		$blog->save();
		// redirect to viewing our new post
		return Redirect::to('blog/view/'.$blog->id);




	}

	public function editGet($id)
	{
		$user = Auth::user();
		$blog = Blog::find($id);
		return View::make('blog.edit')->with('blog', $blog);
	}
	public function editPost($id)
	{
		$user = Auth::user();

		$blog = Blog::find($id);
		if($user->id != $blog->author->id)
		{
			return View::make('blog.view')
			->with('blog', $blog);
		}
		// let's setup some rules for our new data
		// I'm sure you can come up with better ones
		$rules = array(
		'title' 	=> 'required|min:3|max:128',
		'content' 		=> 'required',	
		'file' => 'mimes:jpg,gif,png'	
		);
		$pictrue = '';
		$title = Input::get('title');
		$content = Input::get('content');
		$description = Input::get('title');
		if(empty($description)) $description = substr($content,0, 120);
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
		$new_blog = array(
		'title' 	=> $title,
		'description' 	=> $description,
		'content' 		=> $content,
		'author_id' => $author_id,
		'views' => 0,
		'pictrue'   => $pictrue,
		'tags'   => $tags
		);
		$v = Validator::make($new_blog, $rules);

		if ( $v->fails() )
		{
			// redirect back to the form with
			// errors, input and our currently
			// logged in user
			return Redirect::to('blog/add')
			->with('user', Auth::user())
			->withErrors($v)
			->withInput();
		}

		$blog->title = $title;
		$blog->description = $description;
		$blog->content = $content;
		$blog->author_id = $author_id;
		$blog->tags = $tags;
		if(!empty($pictrue)) $blog->pictrue = $pictrue;
		$blog->save();

		// redirect to viewing our new post
		return Redirect::to('blog/view/'.$blog->id);

	}

	public function view($id)
	{
		// get our post, identified by the route
		// parameter
		$blog = Blog::find($id);
		$blog->views += 1;
		$blog->save();
		// show the full view, and pass the post
		// we just aquired
		return View::make('blog.view')
		->with('blog', $blog);
	}

	public function delete($id)
	{
	}

	public function search()
	{
		return View::make('blog.search');
	}
}