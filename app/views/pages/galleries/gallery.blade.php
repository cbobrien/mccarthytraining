<div class="small-12 medium-8 medium-push-4 columns">
	<div class="row">
		<div class="small-12 columns">
			<div class="gallery-container">
				<h2>{{ ucfirst(str_replace('_', ' ', $city)) }} Gallery</h2>
	
			<?php //dd($images); ?>

				@if(count($images) > 0)
					<div id="slider" class="flexslider">
						<ul class="slides">
							@foreach ($images as $image)
								<li>
									<img src="{{GALLERIES_PATH_WEB}}{{$city}}/{{$image->image}}" alt="{{$image->title}}">														
								</li>							
							@endforeach
						</ul>
					</div>
					<div id="carousel" class="flexslider">
						<ul class="slides">
							@foreach ($images as $image)
								<li>
									<img src="{{GALLERIES_PATH_WEB}}{{$city}}/{{$image->image}}" alt="{{$image->title}}">														
								</li>							
							@endforeach
						</ul>
					</div>			
				@endif

		
			</div>
		</div>
	</div>					
</div>
