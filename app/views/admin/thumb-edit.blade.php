<div class="row">
	<div class="small-12 columns">
		<p class="header">
			<span class="title left">Edit home image</span>
			<a href="{{ URL::route('admin.thumbs') }}" class="button info right">List home images</a>
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

		{{ Form::open(array('method' => 'PATCH', 'route' => array('admin.thumbs.edit.post', $thumb->id), 'name' => 'thumb-edit', 'id' => 'thumb-edit', 'class' => 'thumb-edit', 'files' => true)) }}
			<fieldset>				
				<p>
					<img src="{{THUMBS_PATH_WEB}}{{$thumb->image}}" alt="">
				</p>
				<p>
					{{ Form::label('file','Image', array('id'=>'','class'=>'')) }}
		  			{{ Form::file('file','', array('id'=>'','class'=>'')) }}
				</p>		
				<p>
					{{ Form::button('Save', array('class' => 'submit', 'type' => 'submit')) }}
					<a href="{{ URL::route('admin.thumbs') }}" class="button secondary">Cancel</a>
				</p>							
			</fieldset>
		</form>
	</div>
</div>