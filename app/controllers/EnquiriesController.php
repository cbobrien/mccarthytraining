<?php

class EnquiriesController extends BaseController {

	protected $layout = 'layouts.master';

	public function postEnquiry() {

		if (Session::token() !== Input::get('_token')) {
            return Response::json(array(
            	'status' => 'failure',
                'message' => 'Unauthorized attempt to send enquiry'
            ));
        }

        //validate captcha
       	$captcha = Input::get('captcha');
        $captcha_validate = Validator::make(array('captcha' => $captcha), array('captcha' => array('required', 'captcha')));      

     	if($captcha_validate->fails()) {
        	return Response::json(array(
            	'status' => 'captcha_failure',
                'message' => 'You have entered an invalid value for the captcha'
            ));
        }       
        
		$rules = array(
			'firstname' => 'required|max:100',
			'surname' => 'required|max:100',
			'tel' => 'required|max:100',
			'email' => 'required|email|max:150',
			'questions' => 'required|max:10000',
			'terms' => 'required'
		);

		$input = Input::all();
		$validator = Validator::make($input, $rules);

		if ($validator->passes()) {

			$name = Input::get('firstname') . ' ' . Input::get('surname');
			$email = Input::get('email');

	       	$data = array('name' => Input::get('firstname') . ' ' . Input::get('surname'),
	        			   'tel' => Input::get('tel'),
	        				'email' => Input::get('email'),
	        				'questions' => Input::get('questions'),
	        				'date' => date('d F Y'),
	        				'time' => date('G\hi')
	        			);

	       	//send to admin
	        Mail::send('emails.enquiry', $data, function($message) {
			    $message->from(Input::get('email'), Input::get('firstname') . ' ' . Input::get('surname'));
			    $message->to('Technicaltraining@mcmotor.co.za');
			    $message->subject('Enquiry from Bidvest Automotive Artisan Academy website');
			});

			//send to user
	        Mail::send('emails.enquiry-user', $data, function($message) {
			    $message->from('Technicaltraining@mcmotor.co.za', 'Bidvest Automotive Artisan Academy');
			    $message->to(Input::get('email'));
			    $message->subject('Bidvest Automotive Artisan Academy Enquiry');
			});

			$enquiry = Enquiry::create(Input::all());

			return Response::json(array(
				'status' => 'success',
				'message' => 'Thank you, your enquiry was successfully sent.'
			));
		}
		else {
			return Response::json( array(
				'status' => 'failure',
	            'message' => 'Validation failed'
	        ));
		}

	}

}
