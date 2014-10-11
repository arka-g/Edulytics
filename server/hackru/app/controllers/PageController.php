<?php

class PageController extends \BaseController {

	public function loadCourseSelection()
	{
		$courses = Course::all();
		// return $courses;
		
		return View::make('courses', array('courses' => $courses));
	}

}