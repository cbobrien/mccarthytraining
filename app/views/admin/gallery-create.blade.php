<?php $display_city = str_replace('_', ' ', $city); ?>
<div class="row">
	<div class="small-12 columns">
		<p class="header">
			<span class="title left">New image | {{ $display_city }} Gallery</span>
			<a href="{{ URL::route('admin.gallery', $city) }}" class="button info right">List {{$display_city}} images</a>
		</p> 
	</div>
</div>
<div class="row">
	<div class="small-12 columns">
		@if (Session::has('message'))
			<div class="alert-box warning">
				{{ Session::get('message') }}
			</div>
		@endif
		{{ Form::open(array('route' => array('admin.gallery.create.post', $city), 'name' => 'image-new', 'id' => 'image-new', 'class' => 'image-new', 'files' => true)) }}
			<fieldset>
				<p>
					{{ Form::label('title', 'Title') }}
					{{ Form::text('title', null, array('id' => 'title')) }}
				</p>
				<p>
					{{ Form::label('file','Image', array('id'=>'','class'=>'')) }}
		  			{{ Form::file('file','', array('id'=>'','class'=>'')) }}
				</p>		
				<p>
					{{ Form::button('Save', array('class' => 'submit', 'type' => 'submit')) }}
					<a href="{{ URL::route('admin.gallery', $city) }}" class="button secondary">Cancel</a>
				</p>							
			</fieldset>
		</form>
	</div>
</div>