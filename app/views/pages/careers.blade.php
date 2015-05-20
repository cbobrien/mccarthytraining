<div class="small-12 medium-8 medium-push-4 columns">
	<div class="row">
		<div class="small-12 columns">
			<img src="/images/{{$image}}" class="careers-banner" alt="">
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<div class="career-progressions">
				{{ $content }}
				<?php if(count($careers) > 0) : ?>
					<div id="careerAccordion" class="career-accordion">
						@foreach ($careers as $career)
							<h4>{{ $career->title }}</h4>
							<div>{{ $career->content }}</div>
						@endforeach
					</div> 
				<?php endif; ?>
			</div>
		</div>
	</div>					
</div>
