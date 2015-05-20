<?php

class LoginController extends BaseController {
	
	protected $layout = 'layouts.admin';

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function showLogin() {
		$this->layout->content = View::make('admin.login');
	}

	public function postLogin() {		
		
		$rules = array(
	        'username' => 'required|max:100',                  
	        'password' => 'required|max:100'	      
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	    	$messages = $validator->messages();
	    	return Redirect::to('admin/login')->withErrors($validator);
	    }
	    else {
	    	if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
				return Redirect::to('admin/');
			}
			else {
				return Redirect::to(URL::route('admin.login'))
				->with('error', 'Your username/password combination was incorrect')
				->withInput();
			}
	    }
	}

	public function logout() {
		if(Auth::check()){
			Auth::logout();
		}		
		return Redirect::route('admin.login');
	}
}