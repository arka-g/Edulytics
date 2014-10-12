<?php

class PageController extends \BaseController {

	public $userId = 1;

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
		$userCourse->user_id = $this->userId;

		$userCourse->save();
	}

	public function loadCoursePage($course)
	{
		return View::make('coursedetail', array('course' => $course));
		return $course;
	}

	public function addAssessment()
	{
		$input = Input::all();

		$assessment = new Assessment;

		$assessment->weight_percent = $input['weight'];
		$assessment->assessment_type = $input['type'];
		//This should come from the course eg hidden input
		$assessment->course_id = $input['course'];

		$assessment->save();
	}

	public function loadAssessment($course)
	{
		return Assessment::where('course_id', '=', $course)->get();
	}

	public function addGrade()
	{
		$input = Input::all();

		$userAssessmentGrade = new UserAssessmentGrade;

		$userAssessmentGrade->assessment_id = $input['assessment'];
		$userAssessmentGrade->mark = $input['mark'];
		$userAssessmentGrade->user_id = $this->userId;

		$userAssessmentGrade->save();
	}

	public function editAssessment()
	{
		
	}

	public function loadAddGrade($course)
	{
		$assessment = $this->loadAssessment($course);

		return View::make('addassessmentpage', array('assessments' => $assessment));
	}



}