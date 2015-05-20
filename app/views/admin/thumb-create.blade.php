<div class="row">
	<div class="small-12 columns">
		<p class="header">
			<span class="title left">New home image</span>
			<a href="{{ URL::route('admin.thumbs') }}" class="button right">List home images</a>
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
		{{ Form::open(array('route' => 'admin.thumbs.create.post', 'name' => 'thumb-new', 'id' => 'thumb-new', 'class' => 'thumb-new', 'files' => true)) }}
			<fieldset>
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