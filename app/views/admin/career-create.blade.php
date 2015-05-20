<div class="row">
	<div class="small-12 columns">
		<p class="header">
			<span class="title left">New career</span>
			<a href="{{ URL::route('admin.careers') }}" class="button right">List careers</a>
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
		{{ Form::open(array('route' => 'admin.careers.create.post', 'name' => 'career-new', 'id' => 'career-new', 'class' => 'career-new', 'files' => true)) }}
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
					{{ Form::label('order', 'Order') }}
					{{ Form::number('order', null, array('id' => 'order')) }}
				</p>				
				<p>
					{{ Form::button('Save', array('class' => 'submit', 'type' => 'submit')) }}
					<a href="{{ URL::route('admin.careers') }}" class="button secondary">Cancel</a>
				</p>							
			</fieldset>
		</form>
		<script>
			$(function() {
				CKEDITOR.config.toolbar = [
				   ['Format','Bold','Italic','Underline', 'Link', 'Source']
				];
			 	CKEDITOR.replace('content');
			});
		</script>
	</div>
</div>