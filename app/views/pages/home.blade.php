<div class="small-12 medium-8 medium-push-4 columns">
	<div class="row">
		<div class="small-12 columns">			
			@if($slides->count())
				<div class="carousel">
					@foreach ($slides as $slide)
						<div class="carousel-slide">
							@if(trim($slide->url) != '')
								<a href="{{$slide->url}}">		
							@endif				
							<img src="{{SLIDES_PATH_WEB}}{{$slide->image}}" alt="{{$slide->title}}">
							@if(trim($slide->url) != '')
								</a>
							@endif							
							@if(isset($slide->title) or isset($slide->content))
								<div class="carousel-caption">
									@if(isset($slide->title))
										<h3>{{ $slide->title }}</h3>
									@endif
									@if(isset($slide->content))
										<p>{{ $slide->content }}</p>
									@endif								
								</div>
							@endif
						</div>							
					@endforeach
				</div>				
			@endif			
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<div class="welcome">			
				<div class="row">
					<div class="small-12 large-8 columns">					
						{{ $content }}					
					</div>
					<div class="small-12 large-4 columns home-thumbs show-for-large-up">
						<?php 
							if($thumbs->count()):				
								$i = 0;																				
								foreach ($thumbs as $thumb):									
									if($i > 3) break;	//only display 4 items									
									if ($i % 2 == 0):
										echo '<div class="row">';
									endif;
									?>
									<div class="small-12 medium-6 columns">
										<img src="/images/thumbs/{{$thumb->image}}" alt="">
									</div>
									<?php
									$i++;
									if ($i % 2 == 0):
										echo '</div>';
									endif;																					
								endforeach;										
							endif;
						?>					
					</div>
				</div>
			</div>
		</div>		
	</div>
	<div class="row">
		<div class="small-12 medium-4 columns">
			<p class="address">
				<b>Johannesburg</b><br>
				Unit 4, Cnr Suni &amp; Tsessebe Sage Corporate Park, Midrand<br> 
				011 314 8775
			</p>
		</div>
		<div class="small-12 medium-4 columns">
			<p class="address">
				<b>Cape Town</b><br> 
				9B Barlinka Street, Saxenberg Business Park, Blackheath<br>
				021 905 7997
			</p>
		</div>
		<div class="small-12 medium-4 columns">
			<p class="address">
				<b>Durban</b><br> 
				Unit 16 Palm River Industrial Park, 1 Devon Road, Pinetown<br>
				031 709 0514
			</p>
		</div>
	</div>					
</div>

