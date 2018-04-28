<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Response;

use App\Assistantship;
use App\Semester;
use App\Student;
use App\FundingSource;
use App\TuitionWaiver;
use App\AssistantshipStatus;
use App\Position;
use App\Program;
use App\SemesterName;
use App\Advisor;
use App\GtaAssignment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

    }
	
    private $rules = [
        'position' => 'required|exists:positions,name',
        'date_offered' => 'date|required',
        'date_responded' => 'date',
        'date_deferred' => 'date',
        'current_status_id' => 'required|exists:assistantship_statuses,id',
        'stipend' => 'numeric|min:0',
        'semester_name_id' => 'required',
        'semester_year' => 'required',
        'time' => 'between:0,15',
        'course' => 'required_with:instructor_id',
        'instructor_id' => 'required_with:course',
        'funding_source_id' => 'required',
    ];
	

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $query = Assistantship::with('status','student','semester','corresponding_waiver','funding_source')
            ->join('students','students.id','=','assistantships.student_id')
            ->join('student_programs','students.id','=','student_programs.student_id')
			->join('gta_assignments','assistantships.id','=','gta_assignments.assistantship_id');

        $assists = $query->distinct()->get(['assistantships.*']);

        return view('/home', [
            'assists' => $assists,
            'semesters' => Semester::all()->lists("full_name","id"),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'program_id' => $request->get('program_id'),
            'current_status_id' => $request->get('current_status_id'),
            'funding_source_id' => $request->get('funding_source_id'),
            'semester_id' => $request->get('semester_id'),
			'course' => $request->get('course'),
        ]);
    
    }
}
