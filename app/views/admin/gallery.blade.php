<p class="header">
	<span class="title left">{{ str_replace('_', ' ', $city) }} Gallery</span>
    <span class="right">
        <a href="{{ URL::route('admin.galleries') }}" class="button info">List galleries</a>
        <a href="{{ URL::route('admin.gallery.create', $city) }}" class="button success">New image</a>
    </span>	
</p>
@if (Session::has('message'))
	<div class="alert-box success">
		{{ Session::get('message') }}
	</div>
@endif
<?php if(count($images) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Title</th>
		        <th>Image</th>
		        <th></th>
		        <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
                <tr>
                    <td>{{ $image->title }}</td>
          			<td><img src="{{GALLERIES_PATH_WEB}}/{{{strtolower($city)}}}/{{$image->image}}" alt="{{$image->title}}"></td>			          			
                    <td>{{ link_to_route('admin.gallery.edit', 'Edit', array($image->id, $city), array('class' => 'button info')) }}</td>
                    <td>
          				{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.gallery.delete', $image->id, $city), 'onsubmit' => "return confirm('Are you sure you want to delete this image?');")) }}                       
                            {{ Form::submit('Delete', array('class' => 'button alert')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach			              
        </tbody>			      
    </table>

<?php
else:
    echo '<p>There are no images for this gallery.</p>';
endif;
?>


