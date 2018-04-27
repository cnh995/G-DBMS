<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Response;

use App\Assistantship;
use App\TuitionWaiver;
use App\YearlyBudget;
use App\GtaAssignment;
use App\Assisantship;
use App\Student;
use App\Advisor;
use App\Semester;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
		
        $sort_by = $request->get('sort_by','course');
        $query = GtaAssignment::with('assistantship','instructor')
        	->join('assistantships','assistantships.id','=','gta_assignments.assistantship_id')
        	->join('students','students.id','=','assistantships.student_id')
        	->join('advisors','gta_assignments.instructor_id','=','advisors.id');

        if($sort_by !== 'semester')
        	$query->orderBy($sort_by);

        if($request->has('first_name'))
            $query->where('first_name',$request->get('first_name'));
        if($request->has('last_name'))
            $query->where('last_name',$request->get('last_name'));

        if ($request->has('semester_id'))
        {
            $ids = $request->get('semester_id');
            $query->where(function($query) use ($ids)
            {
                foreach ($ids as $id) {
                    $query->orWhere('semester_id',$id);
                }
            });
        }
        if($request->has('instructor_id'))
        	$query->whereIn($request->get('instructor_id'));

        $gtas = $query->distinct()->get(['gta_assignments.*']);

        if($sort_by === 'semester')
        {
        	$gtas = $gtas->sortByDesc(function($gta){
        		return $gta->assistantship->semester->sort_num;
        	});
        }

        return view('/home', [
            'gtas' => $gtas,
            'semesters' => Semester::all()->lists("full_name","id"),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'sort_by' => $sort_by,
            'sort_options' => ['students.last_name' => 'Student','advisors.last_name' => 'Instructor','semester' => 'Semester', 'course' => 'Course'],
            'semester_id' => $request->get('semester_id'),
            'instructor_id' => $request->get('instructor_id'),
            'instructors' => Advisor::all()->lists('full_name','id'),
        ]);
    
    }

    public function chart(Request $request) {
        // Check to see if the request is an AJAX call
        if (!$request->ajax()) {
            // @TODO return 404 page if it is not AJAX
        }

        $year = $request->input('year');

        $budget = YearlyBudget::find($year, ['budget']);

        if ($budget == null)
            return Response::json(['success' => false]);

        $budget = (double)$budget->budget;

        $assistantships = (double)Assistantship
            ::join('semesters', 'assistantships.semester_id', '=', 'semesters.id')
            ->join('assistantship_statuses','assistantships.current_status_id','=','assistantship_statuses.id')
            ->where('semesters.academic_year', '=', $year)
            ->where('assistantships.funding_source_id', '=', 1)
            ->whereIn('assistantship_statuses.description',['Accepted','Terminated'])
            ->sum('assistantships.stipend');

        $pending_assistantships = (double)Assistantship
            ::join('semesters', 'assistantships.semester_id', '=', 'semesters.id')
            ->join('assistantship_statuses','assistantships.current_status_id','=','assistantship_statuses.id')
            ->where('semesters.academic_year', '=', $year)
            ->where('assistantships.funding_source_id', '=', 1)
            ->where('assistantship_statuses.description','Pending')
            ->sum('assistantships.stipend');

        $waivers = (double)TuitionWaiver
            ::join('semesters', 'tuition_waivers.semester_id', '=', 'semesters.id')
            ->where('semesters.academic_year', '=', $year)
            ->where('tuition_waivers.funding_source_id', '=', 1)
            ->sum('tuition_waivers.amount_received');

        $remaining = $budget - $assistantships - $waivers;

        return Response::json([
            'success' => true,
            'budget' => $budget,
            'assistantships' => $assistantships,
            'waivers' => $waivers,
            'remaining' => $remaining,
            'pending_assistantships' => $pending_assistantships,
        ]);
    }

    public function drilldown(Request $request) {
        // Check to see if the request is an AJAX call
        if (!$request->ajax()) {
            // @TODO return 404 page if it is not AJAX
        }

        $year = $request->input('year');
        $name = $request->input('name');

        $budget = YearlyBudget::find($year, ['budget']);

        if ($budget == null)
            return Response::json(['success' => false]);

        if ($name === 'assistantships' || $name === 'pending_assistantships') {
            if ($name === 'assistantships')
                $options = ['Accepted','Terminated'];
            else if ($name == 'pending_assistantships')
                $options = ['Pending'];

            $data = Assistantship
                ::selectRaw('concat(students.first_name, " ", students.last_name) as full_name, sum(assistantships.stipend) as sum')
                ->join('semesters', 'assistantships.semester_id', '=', 'semesters.id')
                ->join('students', 'assistantships.student_id', '=', 'students.id')
                ->join('assistantship_statuses','assistantships.current_status_id','=','assistantship_statuses.id')
                ->where('semesters.academic_year', $year)
                ->where('assistantships.funding_source_id', 1)
                ->whereIn('assistantship_statuses.description', $options)
                ->groupBy('assistantships.student_id')
                ->lists('sum', 'full_name');
        } else if ($name === 'waivers') {
            $data = TuitionWaiver
                ::selectRaw('concat(students.first_name, " ", students.last_name) as full_name, sum(tuition_waivers.amount_received) as sum')
                ->join('semesters', 'tuition_waivers.semester_id', '=', 'semesters.id')
                ->join('students', 'tuition_waivers.student_id', '=', 'students.id')
                ->where('semesters.academic_year', '=', $year)
                ->where('tuition_waivers.funding_source_id', '=', 1)
                ->groupBy('tuition_waivers.student_id')
                ->lists('sum', 'full_name');
        } else if ($name === 'remaining') {
            $data = [];
        } else {
            return Response::json(['success' => false]);
        }

        $drilldownData = [];
        foreach ($data as $student_name => $amount) {
            $drilldownData[] = [$student_name, (double)$amount];
        }

        return Response::json([
           'success' => true,
           'drilldowns' => ['name' => $name, 'data' => $drilldownData]
        ]);
    }

    public function budget_show(Request $request, YearlyBudget $budget) {
        if ($request->ajax()) {
            return Response::json([
                'success' => $budget != null,
                'budget' => $budget,
            ]);
        }

        return view('/home', [
            'budget' => $budget,
            'years' => YearlyBudget::all()->lists('full_name', 'academic_year'),
        ]);
    }

    public function budget_store(Request $request) {
        $this->validate($request, [
            'academic_year' => 'required|regex:/\d{4}/|unique:yearly_budgets',
        ]);

        $budget = new YearlyBudget($request->all());
        $budget->funding_source_id = 1;
        $budget->save();

        session()->flash(
            'alert-success', "Successfully created a new budget for {$budget->full_name}! Amount: \${$budget->budget}"
        );

        return redirect()->route('budget.show', $budget);
    }

    public function budget_update(Request $request, YearlyBudget $budget) {
        $this->validate($request, [
            'budget' => 'required|numeric|min:0',
        ]);

        $budget->update($request->only(['academic_year', 'budget']));

        session()->flash(
            'alert-success', "Budget update for {$budget->full_name} was successful! New amount: \${$budget->budget}."
        );

        return redirect()->route('budget.show', $budget);
    }
	
	
}
