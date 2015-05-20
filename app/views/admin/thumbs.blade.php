<div class="row">
	<div class="small-12 columns">		
		<p class="header">
			<span class="title left">Home images</span>
			<a href="{{ URL::route('admin.thumbs.create') }}" class="button success right">New home image</a>
		</p>
	</div>
</div>
<div class="row">
	<div class="small-12 columns">
			@if (Session::has('message'))
				<div class="alert-box success">
					{{ Session::get('message') }}
				</div>
			@endif
			@if ($thumbs->count())
			    <table cellpadding="0" cellspacing="0" border="0">
			        <thead>
			            <tr>			                
					        <th>Image</th>
					        <th></th>
					        <th></th>
			            </tr>
			        </thead>
			        <tbody>
			            @foreach ($thumbs as $thumb)
			                <tr>			              
			          			<td><img src="{{THUMBS_PATH_WEB}}{{ $thumb->image }}" alt=""></td>			          			
			                    <td>{{ link_to_route('admin.thumbs.edit', 'Edit', array($thumb->id), array('class' => 'button info')) }}</td>
			                    <td>
			          				{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.thumbs.delete', $thumb->id), 'onsubmit' => "return confirm('Are you sure you want to delete this image?');")) }}                       
			                            {{ Form::submit('Delete', array('class' => 'button alert')) }}
			                        {{ Form::close() }}
			                    </td>
			                </tr>
			            @endforeach			              
			        </tbody>			      
			    </table>
			@else
			    There are no images.
			@endif
	</div>
</div>

		