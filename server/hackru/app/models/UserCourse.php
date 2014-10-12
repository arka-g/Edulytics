<?php

class UserCourse extends \Eloquent {
	protected $fillable = [];
	protected $table = 'user_courses';
	public $timestamps = false;
	//how to link databases
	public function course(){
		return $this->hasOne('Course','id','course_id'); //one for each id
	}
}