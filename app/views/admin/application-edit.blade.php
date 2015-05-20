<div class="row">
	<div class="small-12 columns">
		<p class="header">
			<span class="title left">View Application</span>
			<a href="{{ URL::route('admin.applications') }}" class="button info right">List applications</a>
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

		{{ Form::open(array('method' => 'PATCH', 'route' => array('admin.application.edit.post', $application->id), 'name' => 'application-edit', 'id' => 'application-edit', 'class' => 'application-edit')) }}
			<fieldset>
				<p>					
					<strong>Date</strong><br>
					{{$application->created_at}}				
				</p>
				<p>					
					<strong>Status</strong><br>				
					<select name="status" id="status" onchange="this.form.submit()">
						<option value="Pending" <?php echo $application->status == 'Pending' ? 'selected' : ''; ?>>Pending</option>
						<option value="Approved" <?php echo $application->status == 'Approved' ? 'selected' : ''; ?>>Approved</option>
						<option value="Declined" <?php echo $application->status == 'Declined' ? 'selected' : ''; ?>>Declined</option>
					</select>					
				</p>
				<p>					
					<strong>Fist name</strong><br>
					{{$application->firstname}}					
				</p>
				<p>
					<strong>Surname</strong><br>
					{{$application->surname}}					
				</p>
				<p>
					<strong>Email</strong><br>
					<a href="mailto:{{$application->email}}">{{$application->email}}</a>				
				</p>
				<p>
					<strong>Telephone</strong><br>
					{{$application->tel}}			
				</p>
				<p>
					<strong>Message</strong><br>
					{{$application->message}}				
				</p>		
				<p>
					<?php
					if(trim($application->matric_path) != ''): ?>														
						<a href="{{$application->matric_path}}" class="matric">Matric certificate</a> 									
					<?php
					endif;
					if(trim($application->n2_path) != ''): ?>					
						<a href="{{$application->n2_path}}" class="n2">N2 certificate</a> 										
					<?php
					endif;
					?>				
					<a href="{{$application->id_path}}" class="id">ID</a> 							
					<a href="{{$application->cv_path}}" class="cv">CV</a>				
				{{-- 	<p>
						{{ Form::button('Save', array('class' => 'submit', 'type' => 'submit')) }}
						<a href="{{ URL::route('admin.applications') }}" class="button secondary">Cancel</a>
					</p>	 --}}
				</p>
				<p>
					<br><br>
				</p>						
			</fieldset>
		</form>
	</div>
</div>