<div class="small-12 medium-8 medium-push-4 columns">
	<div class="row">
		<div class="small-12 columns">
			<div class="apply-container">
				<h2>Apply now to the Bidvest Automotive Artisan Academy</h2>

				@if($intro_content != '')
					<p>{{ $intro_content }}</p>
				@endif
				
				@if (Session::has('message'))
					<div class="alert-box">
						{{ Session::get('message') }}
					</div>
				@endif

				@if ($errors->apply->has())
			        <div class="alert-box warning">
			            @foreach ($errors->apply->all() as $error)
			                {{ $error }}<br>        
			            @endforeach
			        </div>
			    @endif

				{{ Form::open(array('route'=>'apply.post', 'name' => 'applyForm', 'id' => 'applyForm', 'class' => 'apply-form', 'files' => true)) }}
					<ul id="stepUl" class="ui-accordion-container">
						<li id="af1">
							<a href='#' class="ui-accordion-link"></a>
							<fieldset>
								<legend>Step 1 of 3</legend>
								<p>
									{{ Form::label('firstname', 'First name:') }}
									{{ Form::text('firstname', null, array('required')) }}
								</p>
								<p>
									{{ Form::label('surname', 'Surname:') }}
									{{ Form::text('surname', null, array('required')) }}
								</p>
								<p>
									{{ Form::label('tel', 'Telephone:') }}
									{{ Form::text('tel', null, array('required')) }}
								</p>
								<p>
									{{ Form::label('email', 'Email:') }}
									{{ Form::email('email', null, array('required')) }}
								</p>
								<p>
									{{ Form::label('message', 'Message:') }}
									{{ Form::textarea('message') }}
								</p>
								<p class="button-container right">
									<input name="formNext1" type="button" class="open1 nextbutton button" value="Next" alt="Next" title="Next">
								</p>
							</fieldset>
						</li>
						<li id="af2">
							<a href='#' class="ui-accordion-link"></a>
							<fieldset>
								<legend>Step 2 of 3</legend>
								<p>
									Please upload only Word documents or PDFs.
								</p>
								<p>
									{{ Form::label('qualification', 'Select which mandatory qualification applies to you:') }}
								</p>
								<p>
									<label for="qualification_matric">									
										{{ Form::radio('qualification', 'matric', false, array('required', 'id' => 'qualification_matric')) }} Matric with Mathematics and Physical Science
									</label>
									<label for="qualification_n2" id="qualification_n2_label">
										{{ Form::radio('qualification', 'N2', false,  array('required', 'id' => 'qualification_n2')) }} Academic Matric with full N2
									</label>
								</p>
								{{-- <label for="qualification" id="qualification-error" class="error" style="display:none;">Please select a qualification</label> --}}
								<div class="file-matric-container">
									<p>
										{{ Form::label('fileMatric', 'Upload matric certificate:') }}
										<div class="upload-container">
											{{-- <div class="upload">			 --}}							
												{{-- Select file...			 --}}								
												{{ Form::file('fileMatric', ['class' => 'fileMatric', 'required']) }}<span></span>												
										{{-- 	</div> --}}
										</div>							
									</p>
								</div>
								<div class="file-N2-container">
									<p>										
										{{ Form::label('fileN2', 'Upload N2 certificate:') }}
										<div class="upload-container">
										{{-- 	<div class="upload">
												Select file... --}}
												{{ Form::file('fileN2', ['class' => 'fileN2', 'required']) }}<span></span>
											{{-- </div> --}}
										</div>																										
									</p>
								</div>
								<p class="button-container right">
									<input name="formBack0" type="button" class="open0 prevbutton button" value="Back" alt="Back" title="Back">
									<input name="formNext2" type="button" class="open2 nextbutton button" value="Next" alt="Next" title="Next">
								</p>
							</fieldset>
						</li>
						<li id="af3">
							<a href='#' class="ui-accordion-link"></a>
							<fieldset>
								<legend>Step 3 of 3</legend>
								<p>
									Please upload only Word documents or PDFs.
								</p>
								<p>
									{{ Form::label('fileID', 'Upload copy of ID:') }}
								</p>
								<div class="upload-container">
									{{-- <div class="upload">
										Select file... --}}
										{{ Form::file('fileID', ['class' => 'fileID', 'required']) }}<span></span>
									{{-- </div> --}}
								</div>							
								<p>
									{{ Form::label('fileCV', 'Upload CV:') }}
								</p>
								<div class="upload-container">
									{{-- <div class="upload">
										Select file... --}}
										{{ Form::file('fileCV', ['class' => 'fileCV', 'required']) }}<span></span>
									{{-- </div> --}}
								</div>
								<p class="button-container right">
									<input name="formBack1" type="button" class="open1 prevbutton button" value="Back" alt="Back" title="Back">
									{{ Form::button('Submit', array('class' => 'button', 'type' => 'submit')) }}
									<!-- <input name="submit" type="submit" id="submit" value="Submit" class="submitbutton" alt="Submit" title="Submit"> -->
								</p>
							</fieldset>
						</li>
					</ul>
				{{ Form::close() }}

			</div>
		</div>
	</div>					
</div>
