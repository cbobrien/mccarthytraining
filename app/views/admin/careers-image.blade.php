<div class="row">
	<div class="small-12 columns">
		<p class="header">
			<span class="title left">Edit careers image</span>
		</p>
	</div>
</div>
<div class="row">
	<div class="small-12 columns">
		@if (Session::has('message'))
			<div class="alert-box">
				{{ Session::get('message') }}
			</div>
		@endif

		{{ Form::open(array('method' => 'PATCH', 'route' => array('admin.careers.image.post'), 'name' => 'careers-image-edit', 'id' => 'careers-image-edit', 'class' => 'careers-image-edit', 'files' => true)) }}
			<fieldset>				
				<p>
					<img src="/images/{{$content}}" alt="">
				</p>
				<p>
					{{ Form::label('file','Image', array('id'=>'','class'=>'')) }}
		  			{{ Form::file('file','', array('id'=>'','class'=>'')) }}
				</p>		
				<p>
					{{ Form::button('Save', array('class' => 'submit', 'type' => 'submit')) }}					
				</p>							
			</fieldset>
		</form>
	</div>
</div>