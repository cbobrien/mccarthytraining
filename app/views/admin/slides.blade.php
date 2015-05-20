<div class="row">
	<div class="small-12 columns">		
		<p class="header">
			<span class="title left">Home slides</span>
			<a href="{{ URL::route('admin.slides.create') }}" class="button success right">New slide</a>
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
			@if ($slides->count())
			    <table cellpadding="0" cellspacing="0" border="0">
			        <thead>
			            <tr>
			                <th>Title</th>
					        <th>Content</th>
					        <th>Image</th>
					        <th></th>
					        <th></th>
			            </tr>
			        </thead>
			        <tbody>
			            @foreach ($slides as $slide)
			                <tr>
			                    <td>{{ $slide->title }}</td>
			          			<td>{{ $slide->content }}</td>
			          			<td><img src="{{SLIDES_PATH_WEB}}{{ $slide->image }}" alt="{{ $slide->title }}"></td>			          			
			                    <td>{{ link_to_route('admin.slides.edit', 'Edit', array($slide->id), array('class' => 'button info')) }}</td>
			                    <td>
			          				{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.slides.delete', $slide->id), 'onsubmit' => "return confirm('Are you sure you want to delete this slide?');")) }}                       
			                            {{ Form::submit('Delete', array('class' => 'button alert')) }}
			                        {{ Form::close() }}
			                    </td>
			                </tr>
			            @endforeach			              
			        </tbody>			      
			    </table>
			@else
			    There are no slides.
			@endif
	</div>
</div>

		