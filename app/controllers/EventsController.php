<?php
class EventsController extends BaseController
{
	protected $layout = 'layouts.main';
	public function index()
	{
		$events = Events::with('author')->orderBy('created_at', 'desc')->paginate(20);

		return View::make('events.index')->with('events', $events);
	}

	public function addGet()
	{
		$user = Auth::user();
		return View::make('events.add')->with('user', $user);

	}
	public function addPost()
	{
		$rules = array(
		    'name' 	=> 'required|min:3|max:128',
		    'description' 		=> 'required',	
		    'file' => 'mimes:jpg,gif,png'	
		    );
		    $logo = '';
		    $name = Input::get('name');
		    $description = Input::get('description');
		    $author_id =Input::get('author_id');
		    $tags =Input::get('tags');
		    if (Input::hasFile('file'))
		    {
		    	$file = Input::file('file');
		    	$ext = $file->guessClientExtension();
		    	$filename = $file->getClientOriginalName();
		    	$file->move(public_path().'/data', md5(date('YmdHis').$filename).'.'.$ext);
		    	$logo = md5(date('YmdHis').$filename).'.'.$ext;
		    }
		    $new_group = array(
		        'name' 	=> $name,
		        'description' 	=> $description,
		        'author_id' => $author_id,
		        'views' => 0,
		        'logo'   => $logo,
		        'tags'   => $tags
		    );
		    $v = Validator::make($new_group, $rules);

		    if ( $v->fails() )
		    {
		    	// redirect back to the form with
		    	// errors, input and our currently
		    	// logged in user
		    	return Redirect::to('events/add')
		    	->with('user', Auth::user())
		    	->withErrors($v)
		    	->withInput();
		    }


		    // create the new post
		    $group = new Events($new_group);
		    $group->save();
		    // redirect to viewing our new post
		    return Redirect::to('events/view/'.$group->id);




	}

	public function editGet($id)
	{
		$user = Auth::user();
		$events= Events::find($id);
		return View::make('events.edit')->with('events', $events);
	}
	public function editPost($id)
	{
		$user = Auth::user();

		$events = Events::find($id);
		if($user->id != $events->author->id)
		{
			return View::make('events.view')
			->with('events', $events);
		}
		// let's setup some rules for our new data
		// I'm sure you can come up with better ones
		$rules = array(
		    'name' 	=> 'required|min:3|max:128',
		    'description' 		=> 'required',	
		    'file' => 'mimes:jpg,gif,png'	
		    );
		    $logo = '';
		    $name = Input::get('name');
		    $description = Input::get('description');
		    $author_id =Input::get('author_id');
		    $tags =Input::get('tags');
		    if (Input::hasFile('file'))
		    {
		    	$file = Input::file('file');
		    	$ext = $file->guessClientExtension();
		    	$filename = $file->getClientOriginalName();
		    	$file->move(public_path().'/data', md5(date('YmdHis').$filename).'.'.$ext);
		    	$logo = md5(date('YmdHis').$filename).'.'.$ext;
		    }
		    $new_events = array(
		        'name' 	=> $name,
		        'description' 	=> $description,
		        'author_id' => $author_id,
		        'views' => 0,
		        'logo'   => $logo,
		        'tags'   => $tags
		    );
		    $v = Validator::make($new_events, $rules);

		    if ( $v->fails() )
		    {
		    	// redirect back to the form with
		    	// errors, input and our currently
		    	// logged in user
		    	return Redirect::to('events/add')
		    	->with('user', Auth::user())
		    	->withErrors($v)
		    	->withInput();
		    }

		    $events->name = $name;
		    $events->description = $description;
		    $events->author_id = $author_id;
		    $events->tags = $tags;
		    if(!empty($logo)) $events->logo = $logo;
		    $events->save();

		    // redirect to viewing our new post
		    return Redirect::to('events/view/'.$events->id);

	}

	public function view($id)
	{
		$events = Events::find($id);
		$events->views += 1;
		$events->save();
		if(Auth::guest()){
			$events->ismember = false;
		}else{
		    $events->ismember = $this->checkmembers($id);
		}
		return View::make('events.view')
		->with('events', $events);
	}
	public function jion($id)
	{
		$user = Auth::user();
		$result = DB::table('events_user')->where('user_id', $user->id)->where('events_id',$id)->get();
		if(empty($result)) {
			DB::table('events_user')->insert(
			array('user_id' => $user->id, 'events_id' => $id)
			);

		}
		return Redirect::to('events/view/'.$id);
	}

	public function checkmembers($eventid)
	{
		$user = Auth::user();
		$result = DB::table('events_user')->where('user_id', $user->id)->where('events_id',$eventid)->get();
		if(empty($result)) {
			return false;
		}else {
			return true;
		}
	}
	public function leave($id)
	{
		$user = Auth::user();
		DB::table('events_user')->where('user_id', $user->id)->Where('events_id',$id)->delete();
		return Redirect::to('events/view/'.$id);
	}

	public function delete($id)
	{
	}

	public function search()
	{
		return View::make('events.search');
	}
}