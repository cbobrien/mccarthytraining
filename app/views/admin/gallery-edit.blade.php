<div class="row">
	<div class="small-12 columns">
		<p class="header">
			<span class="title left">Edit {{ $city }} slide</span>
			<a href="{{ URL::route('admin.gallery', $city) }}" class="button info right">List {{ $city }} slides</a>
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

		{{ Form::open(array('method' => 'PATCH', 'route' => array('admin.gallery.edit.post', $image->id, $city), 'name' => 'gallery-edit', 'id' => 'gallery-edit', 'class' => 'gallery-edit', 'files' => true)) }}
			<fieldset>
				<p>
					{{ Form::label('title', 'Title') }}
					<input type="text" name="title" id="title" value="{{$image->title}}">
				</p>				
				<p>
					<img src="{{GALLERIES_PATH_WEB}}{{$city}}/{{$image->image}}" alt="">
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