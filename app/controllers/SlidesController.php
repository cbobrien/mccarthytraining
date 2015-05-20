<?php

class SlidesController extends BaseController {

	protected $layout = 'layouts.admin';

	public function showHomeSlides() {		
		$slides = Slide::all();
		$this->layout->content = View::make('admin.slides')->with('slides', $slides);
	}

	public function showNewHomeSlide() {
		$this->layout->content = View::make('admin.slides-create');
	}

	public function createNewHomeSlide() {

		if(!empty($_FILES['file']['tmp_name'])) {
	
			$mimetype = Input::file('file')->getClientMimeType();

			if($mimetype != 'image/jpeg') {
				return Redirect::route('admin.slides.create')->withInput()->with('message', 'Please select a jpeg image');
			}

			$title = Input::get('title');
			$content = Input::get('content');			

			$new_image_name = 'slide' . mt_rand() . '.jpg';
			Input::file('file')->move(SLIDES_PATH, $new_image_name);
			
			$data = array('title' => $title, 'content' => 'content', 'image' => $new_image_name);
			Slide::create($data);
			return Redirect::route('admin.slides')->with('message', 'Slide successfully created');
		}
		else {
			return Redirect::route('admin.slides.create')->withInput()->with('message', 'Please select a file');
		}
	}

	public function showEditHomeSlide($id) {
		$slide = Slide::find($id);
        if(is_null($slide)) {
            return Redirect::route('admin.slides');
        }
		$this->layout->content = View::make('admin.slides-edit', compact('slide'));
	}

	public function updateEditHomeSlide($id) {

		$title = Input::get('title');
		$content = Input::get('content');
		$url = Input::get('url');
		$slide = Slide::find($id);

		if(is_null($slide)) {
            return Redirect::route('admin.slides');
        }

		if(!empty($_FILES['file']['tmp_name'])) {

			$mimetype = Input::file('file')->getClientMimeType();

			if($mimetype != 'image/jpeg') {
				return Redirect::route('admin.slides.edit')->withInput()->with('message', 'Please select a jpeg image');
			}

			//delete current image file
			if(file_exists(SLIDES_PATH . $slide->image)) {
				unlink(SLIDES_PATH . $slide->image);
			}

			$new_image_name = 'slide' . mt_rand() . '.jpg';
			Input::file('file')->move(SLIDES_PATH, $new_image_name);
		}		
		
		$slide->title = $title;
		$slide->content = $content;
		$slide->url = $url;
		if(isset($new_image_name)) {
			$slide->image = $new_image_name;	
		}
		$slide->save();

		return Redirect::route('admin.slides')->with('message', 'Slide updated');

	}

	public function deleteHomeSlide($id) {		
		$image_name = DB::table('slides')->where('id', $id)->pluck('image');
		if(file_exists(SLIDES_PATH . $image_name)) {
			unlink(SLIDES_PATH . $image_name);
		}
        Slide::find($id)->delete();
        return Redirect::route('admin.slides')->with('message', 'Slide deleted');
    }

}