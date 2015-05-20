<?php

//display frontend pages
Route::get('/', array('as' => 'pages.home', 'uses' => 'PagesController@showHome'));
Route::get('/career-guide', array('as' => 'pages.careers', 'uses' => 'PagesController@showCareers'));
Route::get('/course-info', array('as' => 'pages.course-info', 'uses' => 'PagesController@showCourse'));
Route::get('/galleries', array('as' => 'pages.galleries.landing', 'uses' => 'PagesController@showGalleryLanding'));
Route::get('/gallery/{city}', array('as' => 'pages.gallery', 'uses' => 'PagesController@showGallery'));
Route::get('/apply', array('as' => 'pages.apply', 'uses' => 'PagesController@showApply'));
Route::get('/apply/success', array('as' => 'pages.apply.success', 'uses' => 'PagesController@showApplySuccess'));
Route::get('/sitemap', array('as' => 'pages.sitemap', 'uses' => 'PagesController@showSitemap'));
Route::get('/terms', array('as' => 'pages.terms', 'uses' => 'PagesController@showTerms'));

//post frontend
Route::post('/enquiry', array('as' => 'enquiry', 'uses' => 'EnquiriesController@postEnquiry'));
Route::post('/apply', array('as' => 'apply.post', 'uses' => 'ApplicationsController@postApplication'));

//-------------------------------blog


//-------------------------------admin
Route::get('/admin', function() {
	return Redirect::to('admin/applications');
});

//login
Route::get('/admin/login', array('as' => 'admin.login', 'uses' => 'LoginController@showLogin'));
Route::post('/admin/login', array('as' => 'admin.login.post', 'uses' => 'LoginController@postLogin'));

//auth filter on all these routes
Route::group(array('before' => 'auth'), function() {

	Route::get('/admin/logout', array('as' => 'admin.logout', 'uses' => 'LoginController@logout'));

	//applications
	Route::get('/admin/applications', array('as' => 'admin.applications', 'uses' => 'AdminController@showApplications'));
	Route::get('/api/applications', array('as' => 'api.applications', 'uses' => 'AdminController@ajaxApplications'));
	Route::get('/admin/application/edit/{id}', array('as' => 'admin.application.edit', 'uses' => 'AdminController@showEditApplication'));
	Route::patch('/admin/application/edit/{id}', array('as' => 'admin.application.edit.post', 'uses' => 'AdminController@updateEditApplication'));
	Route::delete('/admin/application/delete/{id}', array('as' => 'admin.application.delete', 'uses' => 'AdminController@deleteApplication'));
	Route::post('/admin/application/editstatus/{id}', array('as' => 'admin.application.editstatus', 'uses' => 'AdminController@updateApplicationStatus'));

	//copy
	Route::get('/admin/copy/{page}', array('as' => 'admin.copy', 'uses' => 'CopyController@showCopy'));
	Route::post('/admin/copy/{page}', array('as' => 'admin.copy.post', 'uses' => 'CopyController@postCopy'));

	//careers image
	Route::get('/admin/careers-image', array('as' => 'admin.careers.image', 'uses' => 'CareersController@showImage'));
	Route::patch('/admin/careers-image', array('as' => 'admin.careers.image.post', 'uses' => 'CareersController@postImage'));

	//home copy
	// Route::get('/admin/home-copy', array('as' => 'admin.home-copy', 'uses' => 'AdminController@showHomeCopy'));
	// Route::post('/admin/home-copy', array('as' => 'admin.home-copy.post', 'uses' => 'AdminController@postHomeCopy'));

	// //courses copy
	// Route::get('/admin/courses-copy', array('as' => 'admin.courses-copy', 'uses' => 'CoursesController@showCoursesCopy'));
	// Route::post('/admin/courses-copy', array('as' => 'admin.courses-copy.post', 'uses' => 'CoursesController@postCoursesCopy'));

	// //apply copy
	// Route::get('/admin/apply-intro-copy', array('as' => 'admin.apply-intro-copy', 'uses' => 'AdminController@showApplyIntroCopy'));
	// Route::post('/admin/apply-intro-copy', array('as' => 'admin.apply-intro-copy.post', 'uses' => 'AdminController@postApplyIntroCopy'));

	// //contact copy
	// Route::get('/admin/contact-copy', array('as' => 'admin.contact-copy', 'uses' => 'AdminController@showContactCopy'));
	// Route::post('/admin/contact-copy', array('as' => 'admin.contact-copy.post', 'uses' => 'AdminController@postContactCopy'));

	//slides
	Route::get('/admin/slides', array('as' => 'admin.slides', 'uses' => 'SlidesController@showHomeSlides'));
	Route::get('/admin/slides/new', array('as' => 'admin.slides.create', 'uses' => 'SlidesController@showNewHomeSlide'));
	Route::post('/admin/slides/new', array('as' => 'admin.slides.create.post', 'uses' => 'SlidesController@createNewHomeSlide'));
	Route::get('/admin/slides/edit/{id}', array('as' => 'admin.slides.edit', 'uses' => 'SlidesController@showEditHomeSlide'));
	Route::patch('/admin/slides/edit/{id}', array('as' => 'admin.slides.edit.post', 'uses' => 'SlidesController@updateEditHomeSlide'));
	Route::delete('/admin/slides/delete/{id}', array('as' => 'admin.slides.delete', 'uses' => 'SlidesController@deleteHomeSlide'));

	//home thumb images
	Route::get('/admin/thumbs', array('as' => 'admin.thumbs', 'uses' => 'ThumbsController@showAll'));
	Route::get('/admin/thumbs/new', array('as' => 'admin.thumbs.create', 'uses' => 'ThumbsController@showNew'));
	Route::post('/admin/thumbs/new', array('as' => 'admin.thumbs.create.post', 'uses' => 'ThumbsController@createNew'));
	Route::get('/admin/thumbs/edit/{id}', array('as' => 'admin.thumbs.edit', 'uses' => 'ThumbsController@showEdit'));
	Route::patch('/admin/thumbs/edit/{id}', array('as' => 'admin.thumbs.edit.post', 'uses' => 'ThumbsController@updateEdit'));
	Route::delete('/admin/thumbs/delete/{id}', array('as' => 'admin.thumbs.delete', 'uses' => 'ThumbsController@delete'));

	//enquiries (quick contact form)
	Route::get('/admin/enquiries', array('as' => 'admin.enquiries', 'uses' => 'AdminController@showEnquiries'));
	Route::get('/api/enquiries', array('as' => 'api.enquiries', 'uses' => 'AdminController@ajaxEnquiries'));
	Route::get('/admin/enquiry/edit/{id}', array('as' => 'admin.enquiry.edit', 'uses' => 'AdminController@showEditEnquiry'));
	Route::patch('/admin/enquiry/edit/{id}', array('as' => 'admin.enquiry.edit.post', 'uses' => 'AdminController@updateEditEnquiry'));
	Route::delete('/admin/enquiry/delete/{id}', array('as' => 'admin.enquiry.delete', 'uses' => 'AdminController@deleteEnquiry'));

	//galleries
	Route::get('/admin/galleries', array('as' => 'admin.galleries', 'uses' => 'GalleriesController@listGalleries'));
	Route::get('/admin/gallery/{city}', array('as' => 'admin.gallery', 'uses' => 'GalleriesController@showGallery'));
	Route::get('/admin/gallery/new/{city}', array('as' => 'admin.gallery.create', 'uses' => 'GalleriesController@showNewGalleryImage'));
	Route::post('/admin/gallery/new/{city}', array('as' => 'admin.gallery.create.post', 'uses' => 'GalleriesController@createNewGalleryImage'));
	Route::get('/admin/gallery/edit/{id}/{city}', array('as' => 'admin.gallery.edit', 'uses' => 'GalleriesController@showEditGalleryImage'));
	Route::patch('/admin/gallery/edit/{id}/{city}', array('as' => 'admin.gallery.edit.post', 'uses' => 'GalleriesController@updateEditGalleryImage'));
	Route::delete('/admin/gallery/delete/{id}/{city}', array('as' => 'admin.gallery.delete', 'uses' => 'GalleriesController@deleteGalleryImage'));

	//career guide
	Route::get('/admin/careers', array('as' => 'admin.careers', 'uses' => 'CareersController@showCareers'));
	Route::get('/admin/careers/new', array('as' => 'admin.careers.create', 'uses' => 'CareersController@showNewCareer'));
	Route::post('/admin/careers/new', array('as' => 'admin.careers.create.post', 'uses' => 'CareersController@createNewCareer'));
	Route::get('/admin/careers/edit/{id}', array('as' => 'admin.careers.edit', 'uses' => 'CareersController@showEditCareer'));
	Route::patch('/admin/careers/edit/{id}', array('as' => 'admin.careers.edit.post', 'uses' => 'CareersController@updateEditCareer'));
	Route::delete('/admin/careers/delete/{id}', array('as' => 'admin.careers.delete', 'uses' => 'CareersController@deleteCareer'));

});