<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{{ isset($title) ? $title . ' | ' : '' }}}Bidvest Automotive Artisan Academy Admin</title>
	<link rel="stylesheet" href="/css/jquery.dataTables.css">
	<link rel="stylesheet" href="/css/admin.css">
	<script src="/js/jquery.min.js"></script>
	<script src="/css/foundation/js/foundation.min.js"></script>
	<script src="/js/jquery.dataTables.js"></script>
	<script src="/js/ckeditor/ckeditor.js"></script>
	<script src="/js/admin.js"></script>
	<script>
		$(function() {
			$(document).foundation();
		});
	</script>
</head>
<body>

	<?php
		$content_class = '';
		$content_urls = ['copy', 'slides', 'galleries', 'careers']; 
		foreach($content_urls as $content_url) {
			if(stristr($_SERVER['REQUEST_URI'], $content_url)) {
				$content_class = 'active';
				break;
			}
		}
	?>

	<nav class="top-bar" data-topbar role="navigation">

		<ul class="title-area">
			<li class="name">
				<h1><a href="/admin/">Automotive Artisan Admin</a></h1>
			</li>			
			<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
		</ul>

		<section class="top-bar-section">			
			<ul class="right">
				@if (Auth::check())			
					<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'applications') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.applications') }}">Applications</a></li>
					<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'enquiries') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.enquiries') }}">Enquiries</a></li>
					<li class="has-dropdown {{ $content_class }}">
						<a href="#">Content</a>
						<ul class="dropdown">							
							<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'slides') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.slides') }}">Home Page Slides</a></li>
							<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'galleries') !== false || stristr($_SERVER['REQUEST_URI'], 'gallery') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.galleries') }}">Galleries</a></li>
							<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'careers') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.careers') }}">Career Guide</a></li>
							<li class="has-dropdown <?php if(stristr($_SERVER['REQUEST_URI'], 'home') !== false) echo 'active'; ?>">
								<a href="#">Copy</a>
								<ul class="dropdown">
									<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'home') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.copy', 'home') }}">Home Page</a></li>
									<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'home-images') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.thumbs', 'home-images') }}">Home images</a></li>
									<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'careers') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.copy', 'careers') }}">Careers</a></li>
									<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'careers-image') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.careers.image') }}">Careers Image</a></li>																
									<!-- <li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'courses') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.copy', 'courses') }}">Course Info</a></li> -->
									<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'contact') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.copy', 'contact') }}">Contact Form</a></li>
									<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'apply-intro') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.copy', 'apply-intro') }}">Apply Intro</a></li>
									<li class="<?php if(stristr($_SERVER['REQUEST_URI'], 'apply-thank-you') !== false) echo 'active'; ?>"><a href="{{ URL::route('admin.copy', 'apply-thank-you') }}">Apply Thank You</a></li>							
								</ul>
							</li>													
						</ul>
					</li>
					<li><a href="{{ URL::route('admin.logout') }}">Log out</a></li>
				@else
					<li><a href="{{ URL::route('admin.login') }}">Log in</a></li>
				@endif
			</ul>
		</section>
	</nav>

	<div class="row">
		<div class="small-12 columns">
			{{ isset($content) ? $content : '' }}
		</div>					
	</div>

	<!--<footer class="row footer">
		<div class="small-12 medium-9 columns footer-left">
			Copyright <?php echo date("Y"); ?>. All Rights Reserved. 
		</div>
		<div class="small-12 medium-3 columns right">
			<div class="mccarthy-logo">McCarthy Proudly Bidvest</div>
		</div>
	</footer>-->


	
</body>
</html>
