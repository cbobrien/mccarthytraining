<div class="row">
	<div class="small-12 columns">

		<h2>{{ str_replace('-', ' ', ucfirst($page)) }} editor</h2>
	</div>
</div>
<div class="row">
	<div class="small-12 columns">
		{{ Form::open(array('route' => array('admin.copy.post', $page), 'id' => 'copyForm')) }}
			@if (Session::has('updated'))
				<div class="alert-box success">
					{{ Session::get('updated') }}
				</div>
			@endif
		    <p>
		  		<textarea name="content" id="content" class="ckeditor">{{ $content }}</textarea>
		  	</p>		
			<p>
				{{ Form::button("Update", array('type' => 'submit')) }}
			</p>
		{{ Form::close() }}
	</div>
	<script>
	$(function() {
		CKEDITOR.config.toolbar = [
		   ['Format','Bold','Italic','Underline', 'Link', 'Table', 'Source']
		];
		CKEDITOR.config.format_tags	= 'p;h1;h2;h3;h4;h5;h6';
	 	//CKEDITOR.replace('content');
	 	//var editor = CKEDITOR.replace( 'editor1' );
		//CKFinder.setupCKEditor( editor, '/ckfinder/' );

		CKEDITOR.replace( 'content',
		{
			filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?type=Images',
			filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?type=Flash',
			filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		});
	});
	</script>		
</div>