<?php

class ApplicationsController extends BaseController {

	protected $layout = 'layouts.master';

	

	public function postApplication() {

		if (Session::token() !== Input::get('_token')) {
            // return Response::json(array(
            // 	'status' => 'failure',
            //     'message' => 'Unauthorized attempt to send application'
            // ));
            return Redirect::route('pages.apply')->withInput()->with('message', 'Unauthorized attempt to upload application');
        }

		$rules = array(
			'firstname' => 'required|max:100',
			'surname' => 'required|max:100',
			'tel' => 'required|max:100',
			'email' => 'required|email||max:150',
			'message' => 'max:10000',
			'qualification' => 'required|max:10'
		);

		$allowed_types = ['application/pdf', 
							'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
							'application/msword'];							

		$input = Input::all();
		$validator = Validator::make($input, $rules);

		if ($validator->passes()) {

			//check files have been uploaded
			if((empty($_FILES['fileMatric']['tmp_name']) && empty($_FILES['fileN2']['tmp_name']))
					|| (empty($_FILES['fileID']['tmp_name']))
						|| (empty($_FILES['fileCV']['tmp_name']))) {
							return Redirect::route('pages.apply')->withInput()->with('message', 'Please upload all applicable files');
			}

			$qualification = Input::get('qualification');
	
			//check matric certificate mime type and file size
			if(!empty($_FILES['fileMatric']['tmp_name'])) {
				$mimetype = Input::file('fileMatric')->getClientMimeType();
				if(!in_array($mimetype, $allowed_types)) {
					return Redirect::route('pages.apply')->withInput()->with('message', 'Please upload your matric certificate in an appropriate format');			
				}
				if(Input::file('fileMatric')->getSize() > MAX_UPLOAD_SIZE) {
					return Redirect::route('pages.apply')->withInput()->with('message', 'Please upload your matric certificate in an appropriate size');
				}
				//new matric certificate file name
				$matric_file_name = cleanInput(Input::get('firstname')) . '-' . cleanInput(Input::get('surname'))
									. '-Matric-Cert-' . mt_rand() . '.' . Input::file('fileMatric')->getClientOriginalExtension();
			}

			//check N2 certificate mime type and file size
			if(!empty($_FILES['fileN2']['tmp_name'])) {
				$mimetype = Input::file('fileN2')->getClientMimeType();
				if(!in_array($mimetype, $allowed_types)) {
					return Redirect::route('pages.apply')->withInput()->with('message', 'Please upload your N2 certificate in an appropriate format');			
				}
				if(Input::file('fileN2')->getSize() > MAX_UPLOAD_SIZE) {
					return Redirect::route('pages.apply')->withInput()->with('message', 'Please upload your N2 certificate in an appropriate size');
				}
				$n2_file_name = cleanInput(Input::get('firstname')) . '-' . cleanInput(Input::get('surname'))
									. '-N2-Cert-' . mt_rand() . '.' . Input::file('fileN2')->getClientOriginalExtension();
			}

			//check ID anc CV mime types
			if(!in_array(Input::file('fileID')->getClientMimeType(), $allowed_types)
				|| !in_array(Input::file('fileCV')->getClientMimeType(), $allowed_types)) {
					return Redirect::route('pages.apply')->withInput()->with('message', 'Please upload your ID and CV in an appropriate format');			
			}
			//check ID anc CV file sizes
			if(Input::file('fileID')->getSize() > MAX_UPLOAD_SIZE || Input::file('fileCV')->getSize() > MAX_UPLOAD_SIZE) {
				return Redirect::route('pages.apply')->withInput()->with('message', 'Please upload your ID and CV in an appropriate size');
			}

			//create new file names
			$id_file_name = cleanInput(Input::get('firstname')) . '-' . cleanInput(Input::get('surname'))
									. '-ID-' . mt_rand() . '.' . Input::file('fileID')->getClientOriginalExtension();

			$cv_file_name = cleanInput(Input::get('firstname')) . '-' . cleanInput(Input::get('surname'))
									. '-CV-' . mt_rand() . '.' . Input::file('fileCV')->getClientOriginalExtension();

			//move files
			if(strtolower($qualification) == 'matric')
				Input::file('fileMatric')->move(FILES_PATH . 'matric/', $matric_file_name);
			}
			if(strtolower($qualification) == 'n2') {
				Input::file('fileN2')->move(FILES_PATH . 'n2/', $n2_file_name);
			}
			Input::file('fileID')->move(FILES_PATH . 'id/', $id_file_name);
			Input::file('fileCV')->move(FILES_PATH . 'cv/', $cv_file_name);

			//data for insert
			$data = array('firstname' => Input::get('firstname'), 'surname' => Input::get('surname'), 
							'tel' => Input::get('tel'), 'email' => Input::get('email'), 'message' => Input::get('message'),
							'qualification' => ucfirst($qualification), 'id_path' => FILES_PATH_WEB . 'id/'.  $id_file_name,
							'cv_path' => FILES_PATH_WEB . 'cv/'.  $cv_file_name);

			if(isset($matric_file_name)) {
				$data['matric_path'] = FILES_PATH_WEB . 'matric/' . $matric_file_name;
			}

			if(isset($n2_file_name)) {
				$data['n2_path'] = FILES_PATH_WEB . 'n2/' . $n2_file_name;
			}

			$new_app = Application::create($data);

			$id = $new_app->id; //B::table('applications')->insertGetId($data);
			   	

			$email_data = array('name' => Input::get('firstname') . ' ' . Input::get('surname'),
        			   'tel' => Input::get('tel'),
        				'email' => Input::get('email'),
        				'questions' => Input::get('questions'),
        				'date' => date('d F Y'),
        				'time' => date('G\hi'),
        				'url' => URL::to('/') . '/admin/application/edit/' . $id, 
        				'app_message' => Input::get('message')      				
        			);

			//send to admin
	        Mail::send('emails.application', $email_data, function($message) {
			    $message->from(Input::get('email'), Input::get('firstname') . ' ' . Input::get('surname'));
			    $message->to('Technicaltraining@mcmotor.co.za');
			    $message->subject('Application from Bidvest Automotive Artisan Academy website');
			});

			//send to admin
	        Mail::send('emails.application-user', array(), function($message) {
			    $message->from('Technicaltraining@mcmotor.co.za', 'Bidvest Automotive Artisan Academy');
			    $message->to(Input::get('email'));
			    $message->subject('Bidvest Automotive Artisan Academy application');
			});
			
			return Redirect::route('pages.apply.success')->with('message', 'set');
			//return Redirect::route('pages.apply-success')->with('message', 'Thank you. <br><br>Your application has been successfully uploaded. The academy will contact you within 10 working days.');
			// return Response::json(array(
			// 	'status' => 'success',
			// 	'message' => 'Thank you, your enquiry was successfully sent.'
			// ));
		// }
		// else {
		// 	// return Response::json( array(
		// 	// 	'status' => 'failure',
	 //  //           'message' => 'Validation failed'
	 //  //       ));
		// 	return Redirect::route('pages.apply')->withInput()->withErrors($validator, 'apply')->with('message', 'Validation failed');
		// 	//die('ggere');
		// }

	}

	

}
