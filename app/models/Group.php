<?php
class Group extends Eloquent
{
	protected $table = 'groups';
	protected $fillable = array('name','description','author_id','logo','views','tags');
	private $rules = array(
        'name' => 'required|max:80',
        'description'  => 'required',
	);
	private $errors;

	public function author()
	{
		return $this->belongsTo('User', 'author_id');
	}
	public function users()
	{
		return $this->belongsToMany('User');
	}

	public function validate($data)
	{
		$v = Validator::make($data, $this->rules);
		if($v->fails())
		{
			$this->errors = $v->errors;
			return false;
		}
		return true;
	}

	public function errors()
	{
		return $this->errors;
	}
}