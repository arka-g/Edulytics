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

	public function loadCoursePieChart()
	{
		return View::make('pie');
	}

	public function signUp(){
		return View::make('signup');
	}

	public function addUser(){
		$input = Input::all();
		// return $input;
		$users = New User;
		$users->first_name = $input['firstname'];
		$users->last_name = $input['lastname'];
		$users->email = $input['email'];
		$users->password = $input['password'];
		$users->school = $input['school'];

		$users->save();

		return Redirect::to('/');

	}

	public function auth(){
		//must be valid email and password required
		$rules = array(
			'email' => 'required|email',
			'password' => 'required'
			);

		//run validator rules on the inputs
		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			//if not valid
			return Redirect::to('/')->withErrors($validator);
		} 
		else{
			//get userdata for login
			$userdata = array(
				'email'=>Input::get('email'),
				'password'=>Input::get('password')
				);
			if(Auth::attempt($userdata)){
				return Redirect::to('/courses');
			}
			else{
				//validation failed
				return Redirect::to('/');
				// return Response::json(['status'=>400]);

			}
		}
	}


}