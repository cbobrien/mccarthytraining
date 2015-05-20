<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{{ isset($title) ? $title . ' | ' : '' }}}Bidvest Automotive Artisan Academy</title>
	<link href="/css/jquery-ui.min.css" rel="stylesheet">
	<link href="/css/flexslider.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
</head>
<body>
	<div class="off-canvas-wrap" data-offcanvas>
	  	<div class="inner-wrap">
			<nav class="tab-bar hide-for-medium-up {{{ isset($title) ? $title === 'Galleries' || stristr($title, 'galleries') ? 'gallery' : str_replace(" ", "-", trim(strtolower($title))) : 'home' }}}">
				<section class="left-small">
					<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
				</section>
				<span class="off-canvas-title">{{ $title or 'Home' }}</span>
			</nav>
		
		    <aside class="left-off-canvas-menu">	  
		        <ul class="off-canvas-list">
					<li><a href="/" class="{{ (Request::is('/') ? 'active' : '') }} home">Home</a></li>
					<li><a href="{{ URL::route('pages.careers') }}" class="{{ (Request::is('career-guide') ? 'active' : '') }} career-guide">Career Guide</a></li>
					<li><a href="{{ URL::route('pages.course-info') }}" class="{{ (Request::is('course-info') ? 'active' : '') }} course-info">Course Info</a></li>
					<li><a href="{{ URL::route('pages.galleries.landing') }}" class="gallery <?php if(stristr($_SERVER['REQUEST_URI'], "gallery") !== false) echo ' active'; ?>">Gallery</a></li>
					<li><a href="{{ URL::route('pages.apply') }}" class="{{ (Request::is('apply') ? 'active' : '') }} apply">Apply</a></li>
					<li><a href="http://www.mccarthytraining.co.za/blog" class="blog">Blog</a></li>
		        </ul>				       			
			</aside>

			<section class="container">

				<div class="row">
					<div class="small-12 medium-4 columns">
						<ul class="title-area">
							<li class="name">
								<a href="/" class="logo">Artisan Academy</a>
							</li>							
						</ul>
					</div>
					<div class="small-12 medium-8 columns">			
				        <ul class="right top-nav show-for-medium-up">
							<li><a href="/" class="{{ (Request::is('/') ? 'active' : '') }} home"><span>Home</span></a></li>
							<li><a href="{{ URL::route('pages.careers') }}" class="{{ (Request::is('career-guide') ? 'active' : '') }} career-guide"><span>Career Guide</span></a></li>
							<li><a href="{{ URL::route('pages.course-info') }}" class="{{ (Request::is('course-info') ? 'active' : '') }} course-info "><span>Course Info</span></a></li>
							<li><a href="{{ URL::route('pages.galleries.landing') }}" class="<?php if(stristr($_SERVER['REQUEST_URI'], "gallery") !== false) echo ' active'; ?> {{ (Request::is('galleries') ? 'active' : '') }} gallery "><span>Gallery</span></a></li>
							<li><a href="{{ URL::route('pages.apply') }}" class="{{ (Request::is('apply') ? 'active' : '') }} apply"><span>Apply</span></a></li>
				        	<li><a href="http://www.mccarthytraining.co.za/blog" class="blog"><span>Blog</span></a></li>
				        </ul>				       			
					</div>
				</div>

				<div class="row" data-equalizer>
				
					<h2 style="color:#10044c;padding:20px">Sorry, the page you are looking for cannot be found.</h2>
			
					<div class="small-12 medium-4 medium-pull-8 columns">
						<div class="quick-contact">
							{{ DB::table('copy')->where('name', 'contact')->pluck('content') }}				
							
							<div class="enquiry-form-container">

								<img src="/images/ajax-loader-enquiry.gif" alt="" class="enquiry-spinner">

								@if (Session::has('sent'))
									<div class="alert-box success">
										{{ Session::get('sent') }}
									</div>
								@endif
						
								@if ($errors->has())
							        <div class="alert-box warning">
							            @foreach ($errors->all() as $error)
							                {{ $error }}<br>        
							            @endforeach
							        </div>
							    @endif

								<div class="enquiry-message"></div>

								{{ Form::open(array('route' => 'enquiry', 'name' => 'form-enquiry', 'id' => 'form-enquiry', 'class' => 'form-enquiry')) }}
									<fieldset>
										<p>
											{{ Form::label('firstname', 'First name:') }}
											{{ Form::text('firstname', null, array('id' => 'firstname', 'required')) }}
										</p>
										<p>
											{{ Form::label('surname', 'Surname:') }}
											{{ Form::text('surname', null, array('id' => 'surname', 'required')) }}
										</p>
										<p>
											{{ Form::label('tel', 'Telephone:') }}											
											<input type="tel" name="tel" id="tel" required>
										</p>
										<p>
											{{ Form::label('email', 'Email:') }}
											{{ Form::email('email', null, array('id' => 'email', 'required')) }}
										</p>
										<p>
											{{ Form::label('questions', 'Your Questions:') }}
											{{ Form::textarea('questions', null, array('id' => 'questions', 'required')) }}
										</p>								
										<p class="checkbox">
											<label><input type="checkbox" name="terms" id="terms" required>I have read and understand the Terms and Conditions.</label>
										</p>
										<div class="captcha-error"></div>
										<p>
											{{ HTML::image(Captcha::img(), 'Captcha image', array('class' => 'no-min-width', 'id' => 'captchaImage')) }}
											<a href="#" id="reload"><img src="/images/refresh.png" alt="Refresh" class="no-min-width" style="margin-left:5px"></a>
										</p>
										<p>											
											<input type="text" name="captcha" id="captcha" placeholder="Enter the text above" required> 
										</p>
										<p class="text-center">
											{{ Form::button('Submit', array('class' => 'submit', 'type' => 'submit')) }}
										</p>							
									</fieldset>
									<script>

										window.onload = function() {
											$('#reload').click(function(e) { 
												e.preventDefault();       
										       	reloadCaptcha();
										    });
										}

										function reloadCaptcha() {
											 $("#captchaImage").attr("src", '{{ Captcha::img() }}?'+(new Date()).getTime());
										}
										
									</script>
								</form>
							</div>
						</div>
					</div>					
				</div>

				<footer class="row footer">
					<div class="small-12 medium-9 columns footer-left">
						Copyright <?php echo date("Y"); ?>. All Rights Reserved. <a href="{{ URL::route('pages.sitemap') }}" class="{{ (Request::is('sitemap') ? 'active' : '') }}">Site Map</a>| <a href="{{ URL::route('pages.terms') }}" class="{{ (Request::is('terms') ? 'active' : '') }}">Terms and Conditions</a>
					</div>
					<div class="small-12 medium-3 columns">
						<div class="mccarthy-logo">McCarthy Proudly Bidvest</div>
					</div>
				</footer>

			</section>

			<a class="exit-off-canvas"></a>

		</div>
	</div>
	<script src="/js/jquery.min.js"></script>
	<script src="/css/foundation/js/foundation.min.js"></script>
	<script src="/js/slick.min.js"></script>
	<script src="/js/jquery-ui.min.js"></script>	
	<script src="/js/jquery.validate.min.js"></script>
	<script src="/js/additional-methods.min.js"></script>
	<script src="/js/jquery.flexslider-min.js"></script>
	<script src="/js/script.js"></script>
</body>
</html>
