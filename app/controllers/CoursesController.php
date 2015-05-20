<?php

class CoursesController extends BaseController {
	
	protected $layout = 'layouts.admin';

	public function showCoursesCopy() {		
		$content = DB::table('copy')->where('name', 'courses')->pluck('content');
		$this->layout->content = View::make('admin.courses-copy')->with('content', $content);
	}

	public function postCoursesCopy() {
		$content = Input::get('content');
		DB::table('copy')->where('name', 'courses')->update(array('content' => $content));
		return Redirect::route('admin.courses-copy')->with('updated', 'Updated');
	}	

}