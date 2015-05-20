<div class="row">
	<div class="small-12 columns">
		<p class="header">
			<span class="title left">Edit career</span>
			<a href="{{ URL::route('admin.careers') }}" class="button info right">List careers</a>
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

		{{ Form::open(array('method' => 'PATCH', 'route' => array('admin.careers.edit.post', $career->id), 'name' => 'career-edit', 'id' => 'career-edit', 'class' => 'career-edit', 'files' => true)) }}
			<fieldset>
				<p>
					{{ Form::label('title', 'Title') }}
					<input type="text" name="title" id="title" value="{{$career->title}}">
				</p>
				<p>
					{{ Form::label('content', 'Copy') }}
					<textarea name="content" id="content">{{$career->content}}</textarea>
				</p>
				<p>
					{{ Form::label('order', 'Order') }}
					<input type="number" name="order" id="order" value="{{$career->order}}">
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