<div class="row">
	<div class="small-12 columns">
		<p class="header">
			<span class="title left">View Enquiry</span>
			<a href="{{ URL::route('admin.enquiries') }}" class="button info right">List enquiries</a>
		</p>
	</div>
</div>
<div class="row">
	<div class="small-12 columns view">			
		<p>					
			<strong>Date sent</strong><br>
			{{$enquiry->created_at}}				
		</p>		
		<p>					
			<strong>Fist name</strong><br>
			{{$enquiry->firstname}}					
		</p>
		<p>
			<strong>Surname</strong><br>
			{{$enquiry->surname}}					
		</p>
		<p>
			<strong>Email</strong><br>
			<a href="mailto:{{$enquiry->email}}">{{$enquiry->email}}</a>				
		</p>
		<p>
			<strong>Telephone</strong><br>
			{{$enquiry->tel}}			
		</p>
		<p>
			<strong>Questions</strong><br>
			{{$enquiry->questions}}				
		</p>			
		<p>
			<br><br>
		</p>						
	</div>
</div>