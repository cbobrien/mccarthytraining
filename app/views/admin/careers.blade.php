<div class="row">
	<div class="small-12 columns">		
		<p class="header">
			<span class="title left">Career guide</span>
			<a href="{{ URL::route('admin.careers.create') }}" class="button success right">New career</a>
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
			@if (count($careers))
			    <table>
			        <thead>
			            <tr>
			                <th>Title</th>
					        <th>Content</th>
					        <th>Order</th>
					        <th></th>
					        <th></th>
			            </tr>
			        </thead>
			        <tbody>
			            @foreach ($careers as $career)
			                <tr>
			                    <td>{{ $career->title }}</td>
			          			<td><?php echo strlen($career->content) > 75 ? substr($career->content, 0, 75) . '...' : $career->content; ?></td>			          			
			                    <td>{{ $career->order }}</td>
			                    <td class="centre">{{ link_to_route('admin.careers.edit', 'Edit', array($career->id), array('class' => 'button info')) }}</td>
			                    <td class="centre">
			          				{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.careers.delete', $career->id), 'onsubmit' => "return confirm('Are you sure you want to delete this career?');")) }}                       
			                            {{ Form::submit('Delete', array('class' => 'button alert')) }}
			                        {{ Form::close() }}
			                    </td>
			                </tr>
			            @endforeach			              
			        </tbody>			      
			    </table>
			@else
			    There are no careers.
			@endif
	</div>
</div>

		