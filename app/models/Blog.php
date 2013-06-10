<?php
class Blog extends Eloquent
{
     protected $table = 'blogs';
	protected $fillable = array('title','description','content','author_id','views','pictrue','tags');
	private $rules = array(
        'title' => 'required|max:80',
        'content'  => 'required',
    );
    private $errors;
	public function author()
    {
    	return $this->belongsTo('User', 'author_id');
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