<?php

class ThumbsController extends BaseController {

	protected $layout = 'layouts.admin';

	public function showAll() {		
		$thumbs = Thumb::all();
		$this->layout->content = View::make('admin.thumbs', compact('thumbs'));
	}

	public function showNew() {
		$this->layout->content = View::make('admin.thumb-create');
	}

	public function createNew() {

		if(!empty($_FILES['file']['tmp_name'])) {
	
			$mimetype = Input::file('file')->getClientMimeType();

			if($mimetype != 'image/jpeg') {
				return Redirect::route('admin.thumbs.create')->withInput()->with('message', 'Please select a jpeg image');
			}		

			$new_thumb_name = 'thumb' . mt_rand() . '.jpg';
			Input::file('file')->move(THUMBS_PATH, $new_thumb_name);
			
			$data = array('image' => $new_thumb_name);
			Thumb::create($data);
			return Redirect::route('admin.thumbs')->with('message', 'Image successfully created');
		}
		else {
			return Redirect::route('admin.thumbs.create')->withInput()->with('message', 'Please select a file');
		}
	}

	public function showEdit($id) {
		$thumb = Thumb::find($id);
        if(is_null($thumb)) {
            return Redirect::route('admin.thumbs');
        }
		$this->layout->content = View::make('admin.thumb-edit', compact('thumb'));
	}

	public function updateEdit($id) {

		$thumb = Thumb::find($id);

		if(is_null($thumb)) {
            return Redirect::route('admin.thumbs');
        }

		if(!empty($_FILES['file']['tmp_name'])) {

			$mimetype = Input::file('file')->getClientMimeType();

			if($mimetype != 'image/jpeg') {
				return Redirect::route('admin.thumbs.edit')->withInput()->with('message', 'Please select a jpeg image');
			}

			//delete current image file
			if(file_exists(THUMBS_PATH . $thumb->image)) {
				unlink(THUMBS_PATH . $thumb->image);
			}

			$new_thumb_name = 'thumb' . mt_rand() . '.jpg';
			Input::file('file')->move(THUMBS_PATH, $new_thumb_name);

			$thumb->image = $new_thumb_name;
			$thumb->save();	

			return Redirect::route('admin.thumbs.edit', $id)->with('message', 'Image updated');
		}				

	}

	public function delete($id) {		
		$image_name = DB::table('thumbs')->where('id', $id)->pluck('image');
		if(file_exists(THUMBS_PATH . $image_name)) {
			unlink(THUMBS_PATH . $image_name);
		}
        Thumb::find($id)->delete();
        return Redirect::route('admin.thumbs')->with('message', 'Image deleted');
    }

}