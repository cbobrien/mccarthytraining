{{ Form::open(array('route' => 'admin.login')) }}
	<div class="row">
		<div class="small-10 medium-6 columns small-centered">
			<h2>Login</h2>
		</div>
	</div>
	<div class="row">
		<div class="small-10 medium-6 columns small-centered">
			 @if ($errors->has())
		        <div class="alert-box warning">
		            @foreach ($errors->all() as $error)
		                {{ $error }}<br>        
		            @endforeach
		        </div>
		    @endif
			{{ Form::label("username", "Username") }}
			{{ Form::text("username") }}
		</div>
		<div class="small-10 medium-6 columns small-centered">
			{{ Form::label("password", "Password") }}
			{{ Form::password("password") }}
		</div>
	</div>
	<div class="row">
		<div class="small-10 medium-6 columns small-centered">
			{{ Form::button("Login", array('type' => 'submit')) }}
		</div>
	</div>
{{ Form::close() }}
			
			
			
			