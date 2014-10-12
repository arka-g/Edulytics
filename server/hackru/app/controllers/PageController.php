<?php

class PageController extends \BaseController {

	public function loadCourseSelection()
	{
		$courses = Course::all();
		
		return View::make('courses', array('courses' => $courses));
	}

	public function saveCourseSelection()
	{
		$input = Input::all();

		$userCourse = new UserCourse;

		$userCourse->course_id = $input['course'];
		$userCourse->user_id = 1;

		$userCourse->save();
	}

	public function d3Test()
	{
		return View::make('d3');
	}

	public function loadCoursePage($course)
	{
		return $course;
	}

	public function addAssessment()
	{
		$input = Input::all();

		// $userAssessmentGrade = new UserAssessmentGrade;

		// $userAssessmentGrade->assessment_id = 
		// $userAssessmentGrade->mark = 
		// $userAssessmentGrade->user_id = 

		// $userAssessmentGrade->save();
	}

}