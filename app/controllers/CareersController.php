<?php

class CareersController extends BaseController {

	protected $layout = 'layouts.admin';

	public function showCareers() {		
		//$careers = Career::all();
		$careers = DB::table('careers')->orderBy('order', 'asc')->get();
		$this->layout->content = View::make('admin.careers')->with('careers', $careers);
	}

	public function showNewCareer() {
		$this->layout->content = View::make('admin.career-create');
	}

	public function createNewCareer() {
		//$data = array('title' => Input::get('title'), 'content' => Input::get('content'));
		$input = Input::all();
		Career::create($input);
		return Redirect::route('admin.careers')->with('message', 'Career successfully created');
	}

	public function showEditCareer($id) {
		$career = Career::find($id);
        if(is_null($career)) {
            return Redirect::route('admin.careers');
        }
		$this->layout->content = View::make('admin.career-edit', compact('career'));
	}

	public function updateEditCareer($id) {
		$career = Career::find($id);
		if(is_null($career)) {
            return Redirect::route('admin.careers');
        }			
		$career->title = Input::get('title');
		$career->content = Input::get('content');
		$career->order = Input::get('order');		
		$career->save();
		return Redirect::route('admin.careers')->with('message', 'Career updated');
	}

	public function deleteCareer($id) {			
        Career::find($id)->delete();
        return Redirect::route('admin.careers')->with('message', 'Career deleted');
    }

    public function showImage() {		
		$content = DB::table('copy')->where('name', 'careers-image')->pluck('content');
		$this->layout->content = View::make('admin.careers-image', compact('content'));
	}

	public function postImage() {
	
		if(!empty($_FILES['file']['tmp_name'])) {

			$current_image = DB::table('copy')->where('name', 'careers-image')->pluck('content');

			if(trim($current_image) !== ''){
				$current_image_path = public_path() . '/images/' . $current_image;
				if(file_exists($current_image_path)) {
					unlink($current_image_path);
				}
			}

			$new_image_name = 'careers-image' . mt_rand() . '.' . Input::file('file')->getClientOriginalExtension();
			Input::file('file')->move(public_path() . '/images/', $new_image_name);

			DB::table('copy')->where('name', 'careers-image')->update(array('content' => $new_image_name));
			return Redirect::route('admin.careers.image')->with('message', 'Image updated');
		}
		else {
			return Redirect::route('admin.careers.image')->with('message', 'Please select an image');
		}	
		
		
	}

}