<?php
class GroupController extends BaseController
{
	protected $layout = 'layouts.main';
	public function index()
	{
		$groups = Group::with('author')->orderBy('created_at', 'desc')->paginate(20);
		return View::make('group.index')->with('groups', $groups);
	}

	public function addGet()
	{
		$user = Auth::user();
		return View::make('group.add')->with('user', $user);

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
		    	return Redirect::to('group/add')
		    	->with('user', Auth::user())
		    	->withErrors($v)
		    	->withInput();
		    }
		    $group = new Group($new_group);
		    $group->save();
		    return Redirect::to('group/view/'.$group->id);




	}

	public function editGet($id)
	{
		$user = Auth::user();
		$group = Group::find($id);
		return View::make('group.edit')->with('group', $group);
	}
	public function editPost($id)
	{
		$user = Auth::user();

		$group = Group::find($id);
		if($user->id != $group->author->id)
		{
			return View::make('group.view')
			->with('group', $group);
		}
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
		    	return Redirect::to('group/add')
		    	->with('user', Auth::user())
		    	->withErrors($v)
		    	->withInput();
		    }

		    $group->name = $name;
		    $group->description = $description;
		    $group->author_id = $author_id;
		    $group->tags = $tags;
		    if(!empty($logo)) $group->logo = $logo;
		    $group->save();
		    return Redirect::to('group/view/'.$group->id);

	}

	public function view($id)
	{
		$group = Group::find($id);
		$group->views += 1;
		$group->save();
	    if(Auth::guest()){
			$group->ismember = false;
		}else{
		    $group->ismember = $this->checkmembers($id);
		}
		return View::make('group.view')
		->with('group', $group);
	}
	public function jion($id)
	{
		$user = Auth::user();
		$result = DB::table('group_user')->where('user_id', $user->id)->where('group_id',$id)->get();
		if(empty($result)) {
			DB::table('group_user')->insert(
			array('user_id' => $user->id, 'group_id' => $id)
			);
				
		}
		return Redirect::to('group/view/'.$id);
	}

	public function checkmembers($groupid)
	{
		$user = Auth::user();
		$result = DB::table('group_user')->where('user_id', $user->id)->where('group_id',$groupid)->get();
		if(empty($result)) {
			return false;
		}else {
			return true;
		}
	}
	public function leave($id)
	{
		$user = Auth::user();
		DB::table('group_user')->where('user_id', $user->id)->Where('group_id',$id)->delete();
		return Redirect::to('group/view/'.$id);
	}

	public function delete($id)
	{
	}

	public function search()
	{
		return View::make('group.search');
	}
}