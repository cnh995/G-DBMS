@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-und">
				<div class="panel-heading">
					<h2 class="panel-title">Add Prospective Student</h2>
				</div>
				<div class="panel-body">

					{!! Form::model($student, ['route' => ['prospective_student.store_submit', $student], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
						@include('prospective_student/partials/_prospective_student_addedit')
					{!! Form::close() !!}
				</div>
			</div>
 		</div>
	</div>
</div>
@endsection
