<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
	{!! Form::label('first_name', 'First Name:', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::text('first_name', null, ['class' => 'form-control']) !!}

		@if ($errors->has('first_name'))
			<span class="help-block">
				<strong>{{ $errors->first('first_name') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
	{!! Form::label('last_name', 'Last Name:', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::text('last_name', null, ['class' => 'form-control']) !!}

		@if ($errors->has('last_name'))
			<span class="help-block">
				<strong>{{ $errors->first('last_name') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
	{!! Form::label('id', 'EMPLID:', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::text('id', null, ['class' => 'form-control']) !!}

		@if ($errors->has('id'))
			<span class="help-block">
				<strong>{{ $errors->first('id') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	{!! Form::label('email', 'Email:', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::email('email', null, ['class' => 'form-control']) !!}

		@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('current_position') ? ' has-error' : '' }}">
	{!! Form::label('current_position', 'Current Position:', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::text('current_position', null, ['class' => 'form-control']) !!}

		@if ($errors->has('current_position'))
			<span class="help-block">
				<strong>{{ $errors->first('current_position') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
	{!! Form::label('contact_number', 'Contact Number:', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::text('contact_number', null, ['class' => 'form-control']) !!}

		@if ($errors->has('contact_number'))
			<span class="help-block">
				<strong>{{ $errors->first('contact_number') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('advising_students') ? ' has-error' : '' }}">
	{!! Form::label('advising_students', 'No of Advising Students:', ['class' => 'col-md-4 control-label']) !!}

	<div class="col-md-6">
		{!! Form::text('advising_students', null, ['class' => 'form-control']) !!}

		@if ($errors->has('advising_students'))
			<span class="help-block">
				<strong>{{ $errors->first('advising_students') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		<div class="btn-group">
       	{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
       	{!! Form::button('Cancel', ['onClick' => "parent.location='/advisor'", 'class' => 'btn btn-danger']) !!}
        </div>
    </div>
</div>