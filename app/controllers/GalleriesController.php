<?php

class GalleriesController extends BaseController {
	
	protected $layout = 'layouts.admin';

	public function listGalleries() {
		$this->layout->content = View::make('admin.galleries-list');
	}

	public function showGallery($city) {

		$images = DB::table('galleries')->where('city', $city)->get();
		$this->layout->content = View::make('admin.gallery')->with('images', $images)->with('city', $city);
	}

	public function showNewGalleryImage($city) {
		$this->layout->content = View::make('admin.gallery-create', compact('city'));
	}



	public function createNewGalleryImage($city) {

		if(!empty($_FILES['file']['tmp_name'])) {
	
			$mimetype = Input::file('file')->getClientMimeType();

			if($mimetype != 'image/jpeg') {
				return Redirect::route('admin.gallery.create', $city)->withInput()->with('message', 'Please select a jpeg image');
			}			

			$new_image_name = 'image' . rand() . '.jpg';
			Input::file('file')->move(GALLERIES_PATH . strtolower($city) . '/', $new_image_name);
			
			$data = array('title' => Input::get('title'),
						   'city' => $city,
						   'image' => $new_image_name);

			Gallery::create($data);
			return Redirect::route('admin.gallery', $city)->with('message', 'Image successfully uploaded');
		}
		else {
			return Redirect::route('admin.gallery.create', $city)->withInput()->with('message', 'Please select a file');
		}

	}

	public function showEditGalleryImage($id, $city) {
		$image = Gallery::find($id);
        if(is_null($image)) {
            return Redirect::route('admin.galley', $city);
        }
		$this->layout->content = View::make('admin.gallery-edit', compact('image', 'city'));
	}

	public function updateEditGalleryImage($id, $city) {

		$title = Input::get('title');
		$image = Gallery::find($id);
		
		if(is_null($image)) {
            return Redirect::route('admin.gallery', $city);
        }

		if(!empty($_FILES['file']['tmp_name'])) {

			$mimetype = Input::file('file')->getClientMimeType();

			if($mimetype != 'image/jpeg') {
				return Redirect::route('admin.gallery.edit', $city)->withInput()->with('message', 'Please select a jpeg image');
			}

			//delete current image file
			$image_path = GALLERIES_PATH . strtolower($city) . '/' . $image->image;
			//dd($image_path);
			if(file_exists($image_path)) {
				unlink($image_path);
			}

			$new_image_name = 'image' . rand() . '.jpg';
			Input::file('file')->move(GALLERIES_PATH . strtolower($city) . '/', $new_image_name);
		}		
		
		$image->title = $title;
		if(isset($new_image_name)) {
			$image->image = $new_image_name;	
		}
		$image->save();

		return Redirect::route('admin.gallery', $city)->with('message', 'Slide updated');

	}


	public function deleteGalleryImage($id, $city) {		
		$image_name = DB::table('galleries')->where('id', $id)->pluck('image');
		$image_path = GALLERIES_PATH . $city . '/' . $image_name;		
		if(file_exists($image_path)) {
			unlink($image_path);
		}
        Gallery::find($id)->delete();
        return Redirect::route('admin.gallery', $city)->with('message', 'Slide deleted');
    }
}