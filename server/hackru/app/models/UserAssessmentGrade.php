<?php

class UserAssessmentGrade extends \Eloquent {
	protected $fillable = [];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_assessment_grade';

	public function userAssessmentGrade()
    {
        return $this->hasOne('Assessment', 'id', 'assessment_id');
    }

    public function userInfo()
    {
    	return $this->hasOne('User', 'id', 'user_id');
    }
    	public $timestamps = false;

}