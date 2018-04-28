@extends('layouts.app')

@section('content')
<?php $allowViewing = in_array(Auth::user()->role->name, ['Director', 'Chair', 'Secretary'], true); ?>
<?php $allowChanges = Auth::user()->role->name == 'Director'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-und">
                <div class="panel-heading">Dashboard - GTA Assignments</div>
						</nav>
				
				
				
        			<table class='table table-striped table-condensed table-bordered'>
        				<tr>
        					<td><strong>GTA</strong></td>
							<td><strong>Credits</strong></td>
							<td><strong>Course</strong></td>
							<td><strong>Time</strong></td>
							<td><strong># Labs/Grader</strong></td>
        					<td><strong>Instructor</strong></td>
        				</tr>
						
	            		<!-- Start data for each student -->
		            	@foreach($assists as $assist)
		            		<tr>
		            			
		            			<td>{{ $assist->student->full_name }}</td>
								<td>{{ $assist->corresponding_waiver->credit_hours }}</td>
								<td>{{ $assist->gta_assignment->course }}</td>
								<td>{{ $assist->time }}</td>
		            			<td>{{ $assist->gta_assignment->num_labs_or_grader }}</td>
		            			<td>{{ $assist->gta_assignment->instructor->proper_name }}</td>
							</tr>
		            	@endforeach
	            	</table>
            </div> <!-- /.panel-und -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
@endsection