<div class="row">
	<div class="small-12 columns">
		<p class="header">
			<span class="title left">New slide</span>
			<a href="{{ URL::route('admin.slides') }}" class="button right">List slides</a>
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
		{{ Form::open(array('route' => 'admin.slides.create.post', 'name' => 'slide-new', 'id' => 'slide-new', 'class' => 'slide-new', 'files' => true)) }}
			<fieldset>
				<p>
					{{ Form::label('title', 'Title') }}
					{{ Form::text('title', null, array('id' => 'title')) }}
				</p>
				<p>
					{{ Form::label('content', 'Copy') }}
					{{ Form::textarea('content', null, array('id' => 'content')) }}
				</p>
				<p>
					{{ Form::label('file','Image', array('id'=>'','class'=>'')) }}
		  			{{ Form::file('file','', array('id'=>'','class'=>'')) }}
				</p>		
				<p>
					{{ Form::button('Save', array('class' => 'submit', 'type' => 'submit')) }}
					<a href="{{ URL::route('admin.slides') }}" class="button secondary">Cancel</a>
				</p>							
			</fieldset>
		</form>
	</div>
</div>