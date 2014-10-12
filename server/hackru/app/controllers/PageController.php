<?php

class PageController extends \BaseController {

	public $userId = 1;

	public function loadCourseSelection()
	{
		$courses = Course::all();
		$userCourse = UserCourse::with(array('course'))->where('user_id','=',1)->get();
		//return $userCourse;
		
		return View::make('courses', array('courses' => $courses,'usercourse' => $userCourse));
	}

	public function saveCourseSelection()
	{
		$input = Input::all();

		$userCourse = new UserCourse;

		$userCourse->course_id = $input['course'];
		$userCourse->user_id = $this->userId;

		$userCourse->save();

		return Redirect::to('/courses');
	}

	public function loadUserCourseSelection(){

		return View::make('usercourse', array('usercourse' => $userCourse));
	}

	public function loadCoursePage($course)
	{
		$assessment = $this->loadAssessment($course);
		return View::make('coursedetail', array('course' => $course, 'assessment' => $assessment));
		return $course;
	}

	public function addAssessment()
	{
		$input = Input::all();
		//return $input;
		$assessment = new Assessment;

		$assessment->weight_percent = $input['weight'];
		$assessment->assessment_type = $input['type'];
		//This should come from the course eg hidden input
		$assessment->course_id = $input['course'];

		$assessment->save();

		return Redirect::to('/courses/'.$input['course'].'/grades');
	}

	public function loadAssessment($course)
	{
		$Assessment = Assessment::where('course_id', '=', $course)->get();
		return $Assessment;
	}

	public function addGrade()
	{
		$input = Input::all();
		// return $input;
		$userAssessmentGrade = new UserAssessmentGrade;

		$userAssessmentGrade->assessment_id = $input['assessment'];
		$userAssessmentGrade->mark = $input['mark'];
		$userAssessmentGrade->user_id = $this->userId;

		$userAssessmentGrade->save();

		return Redirect::to('/courses');
	}

	public function editAssessment()
	{
		
	}

	public function loadAddGrade($course)
	{
		$assessment = $this->loadAssessment($course);

		return View::make('addassessmentpage', array('assessments' => $assessment,'course'=>$course));
	}



}