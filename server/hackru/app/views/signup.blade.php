<h1>Sign Up Page</h1>
	<div class="container">
		<div class="row">
			{{ Form::open(array('url' => 'signupPost')) }}
					<p>
					{{ Form::label('firstname', 'First Name: ') }}
					{{ Form::text('firstname') }}
				</p>
				<p>
					{{ Form::label('lastname', 'Last Name: ') }}
					{{ Form::text('lastname') }}
				</p>
				<p>
					{{ Form::label('school', 'School: ') }}
					{{ Form::text('school') }}
				</p>


				<p>
					{{ Form::label('email', 'Email Address: ') }}
					{{ Form::text('email') }}
				</p>

				<p>
					{{ Form::label('password', 'Password: ') }}
					{{ Form::text('password') }}
				</p>

				<p>{{ Form::submit('Submit!') }}</p>
			{{ Form::close() }}

		</div>
	</div>