<div class="row">
	<div class="small-12 columns">
		<p class="header">
			<span class="title left">Edit slide</span>
			<a href="{{ URL::route('admin.slides') }}" class="button info right">List slides</a>
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

		{{ Form::open(array('method' => 'PATCH', 'route' => array('admin.slides.edit.post', $slide->id), 'name' => 'slide-edit', 'id' => 'slide-edit', 'class' => 'slide-edit', 'files' => true)) }}
			<fieldset>
				<p>
					{{ Form::label('title', 'Title') }}
					<input type="text" name="title" id="title" value="{{$slide->title}}">
				</p>				
				<p>
					{{ Form::label('content', 'Copy') }}
					<textarea name="content" id="content">{{$slide->content}}</textarea>
				</p>
				<p>
					{{ Form::label('url', 'URL') }}
					<textarea name="url" id="url">{{$slide->url}}</textarea>
				</p>
				<p>
					<img src="{{SLIDES_PATH_WEB}}{{$slide->image}}" alt="">
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