<?php
class Photo extends Eloquent
{
    protected $table = 'photos';
	protected $fillable = array('title','description','pictrue','author_id','views','tags');
	private $rules = array(
        'title' => 'required|max:120',
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