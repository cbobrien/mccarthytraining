<?php

class PagesController extends BaseController {

	protected $layout = 'layouts.master';

	public function showHome() {
		View::share('description', 'We offer mechanic and trade testing training,automotive training plus auto electrical and autotronics training.');		
		View::share('keywords', 'Trade testing training, automotive training');
		View::share('title', 'Bidvest Automotive Artisan Academy | McCarthy Training');	
		$content = DB::table('copy')->where('name', 'home')->pluck('content');
		$slides = Slide::all();
		$thumbs = Thumb::all();
		$this->layout->content = View::make('pages.home', compact('content', 'slides', 'thumbs'));
	}

	public function showCareers() {
		View::share('title', 'Career Guide | Bidvest Automotive Artisan Academy');
		View::share('description', 'The Bidvest Automotive Artisan Academy has developed a comprehensive career programme for mechanic apprenticeships and electrician training.');		
		View::share('keywords', 'mechanic apprecticeships, electrical training');	
		$careers = DB::table('careers')->orderBy('order', 'asc')->get();
		$image = DB::table('copy')->where('name', 'careers-image')->pluck('content');
		$content = DB::table('copy')->where('name', 'careers')->pluck('content');
		$this->layout->content = View::make('pages.careers', compact('careers', 'content', 'image'));
	}

	public function showCourse() {
		View::share('title', 'Course Info | Bidvest Automotive Artisan Academy');
		View::share('description', 'We have a variety of   MerSETA accredited training courses . The range covers  automotive courses, electrical courses as well as mechanic couses.');		
		View::share('keywords', 'electrical courses, automotive courses, mechanic courses');
		$course_content = DB::table('copy')->where('name', 'courses')->pluck('content');
		$this->layout->content = View::make('pages.course-info', compact('course_content'));
	}

	public function showGalleryLanding() {
		View::share('title', 'Galleries | Bidvest Automotive Artisan Academy');
		View::share('description', 'We have several images of students at work at all our mechanic schools. We have a wide gallery covering the diesel mechanic training and equipment used.');		
		View::share('keywords', 'Mechanic schools, diesel mechanic training');
		$this->layout->content = View::make('pages.galleries.landing');
	}

	public function showGallery($city) {
		$city_title = str_replace('_', ' ', ucwords($city));
		switch($city_title) {
			case 'Cape Town':
				$description = 'Images from our Cape Town training centre showing students and staff complement in the training facilities.';
				$keywords = 'Automotive apprenticeships, automotive training academy';
				break;
			case 'Durban':
				$description = 'The academy takes great pride in the training centre in Durban, as we have managed to produce quality graduates in the school as a whole.';
				$keywords = 'mechanical apprenticeships, mccarthy training';
				break;
			case 'Johannesburg':
				$description = 'The Johannesburg centre attracts several applicants each year. We get graduates across the board, form electricial training through to motor mechanic training.';
				$keywords = 'electrical training , motor mechanic training';
				break;
			default:
				$description = '';
				$keywords = '';

		}
		View::share('title', $city_title . ' Gallery | Bidvest Automotive Artisan Academy');
		View::share('description', $description);		
		View::share('keywords', $keywords);
		$images = DB::table('galleries')->where('city', $city)->get();
		$this->layout->content = View::make('pages.galleries.gallery', compact('images', 'city'));
	}

	public function showApply() {
		View::share('title', 'Apply to register at the Bidvest Artisan Academy');
		View::share('description', 'Our application process is fairly simple. Ensure you have Matric with Mathematics and Physical Science or academic Matric with full N2. Submit online.');		
		View::share('keywords', 'mechanic schools, diesel mechanic training, electrician training, mechanic apprenticeships, automotive training academy');
		$intro_content = DB::table('copy')->where('name', 'apply-intro')->pluck('content');
		$this->layout->content = View::make('pages.apply')->with('intro_content', $intro_content);
	}

	public function showApplySuccess() {
		if(Session::has('message')) {
			$content = DB::table('copy')->where('name', 'apply-thank-you')->pluck('content');
			View::share('title', 'Apply to register at the Bidvest Artisan Academy');
			$this->layout->content = View::make('pages.apply-success')->with('content', $content);
		}
		else {
			return Redirect::route('pages.apply');
		}
	}

	public function showSitemap() {
		View::share('title', 'Site Map');
		$this->layout->content = View::make('pages.sitemap');
	}

	public function showTerms() {
		View::share('title', 'Terms &amp; Conditions');
		$this->layout->content = View::make('pages.terms');
	}

}
