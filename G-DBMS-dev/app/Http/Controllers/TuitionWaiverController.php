<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TuitionWaiver;
use App\Student;
use App\Semester;
use App\SemesterName;
use App\FundingSource;

class TuitionWaiverController extends Controller
{
    private $rules = [
        'date_received' => 'required_with:received|date',
        'amount_received' => 'required|numeric|min:0',
        'credit_hours' => 'required|numeric|min:0|max:21',
        'funding_source_id' => 'required|exists:funding_sources,id',
        'received' => 'required_with:date_received',
    ];

    private $messages = [

    ];

    private $sort_options = [
        'semester_id' => 'Semester',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

    }

    public function index(Request $request) {
        $sort_by = $request->get('sort_by', 'semester_id');

        $waivers = TuitionWaiver::with('semester', 'student', 'funding_source');

        $semesters = Semester::with('name')
            ->orderBy('calendar_year', 'desc')
            ->orderBy('id', 'desc')
            ->get()
            ->pluck('full_name', 'id');

        $sources = FundingSource::orderBy('name', 'asc')
            ->pluck('name', 'id');

        if ($request->has('semester_id'))
            $waivers->whereIn('semester_id', $request->get('semester_id'));
        if ($request->has('funding_source_id'))
            $waivers->whereIn('funding_source_id', $request->get('funding_source_id'));
        if ($request->has('received'))
            $waivers->whereIn('received', $request->get('received'));

        if ($sort_by === 'semester_id') {
            $waivers = $waivers->get()
                ->sortByDesc(function ($waiver) {
                    return $waiver->semester->sort_num;
                });
        } else {
            $waivers = $waivers->get();
        }

        return view('/tuition_waiver/index', [
            'waivers' => $waivers,
            'sort_options' => $this->sort_options,
            'sort_by' => $sort_by,
            'semesters' => $semesters,
            'semester_id' => $request->get('semester_id'),
            'sources' => $sources,
            'source_id' => $request->get('funding_source_id'),
            'received_choices' => [1 => 'Yes', 0 => 'No'],
            'received_choice' => $request->get('received'),
        ]);
    }

    public function store() {
        $students = Student::whereHas('programs', function($query) {
                return $query->where('student_programs.is_current', 1);
            })
            ->get(['id', 'first_name', 'last_name'])
            ->pluck('full_name', 'id');

        $sources = FundingSource::pluck('name', 'id');

        return view('/tuition_waiver/store', [
            'waiver' => null,
            'students' => $students,
            'semester_names' => SemesterName::pluck('name','id'),
            'sources' => $sources,
        ]);
    }

    public function store_submit(Request $request) {
        $this->rules['student_id'] = 'required|exists:students,id';
        $this->rules['semester_name_id'] = 'required|exists:semester_names,id';
        $this->rules['semester_year'] = 'required|numeric|digits:4|regex:/\d{4}/';

        $this->validate($request, $this->rules, $this->messages);

        $to_fill = $request->except(['received', 'date_received', 'semester_name_id','semester_year']);
        $to_fill['received'] = $request->has('received');
        $to_fill['date_received'] = $request->get('date_received') ?: null;
        $to_fill['semester_id'] = Semester::firstOrCreate([
            'name_id' => $request->get('semester_name_id'),
            'calendar_year' => $request->get('semester_year'),
            'academic_year' => Semester::getAcademicYear($request->get('semester_name_id'),$request->get('semester_year')),
        ])->id;

        $waiver = TuitionWaiver::create($to_fill);

        session()->flash('alert-success', 'The Tuition Waiver has been successfully created.');

        return redirect('/waiver');
    }

    public function update(TuitionWaiver $waiver) {
        $waiver->load('student', 'semester', 'funding_source');

        $sources = FundingSource::pluck('name', 'id');

        return view('/tuition_waiver/update', [
            'waiver' => $waiver,
            'semester_names' => SemesterName::all()->pluck('name','id'),
            'sources' => $sources,
        ]);
    }

    public function update_submit(Request $request, TuitionWaiver $waiver) {
        $this->validate($request, $this->rules, $this->messages);

        $waiver->date_received = $request->get('date_received') ?: null;
        $waiver->amount_received = $request->get('amount_received') ?: null;
        $waiver->credit_hours = $request->get('credit_hours') ?: null;
        $waiver->funding_source_id = $request->get('funding_source_id');
        $waiver->received = $request->has('received');

        $waiver->save();

        session()->flash('alert-success', 'The Tuition Waiver has been successfully updated.');

        return redirect('/waiver');
    }

    public function delete(TuitionWaiver $waiver) {
        $waiver->delete();
        session()->flash('alert-success', 'The Tuition Waiver has been successfully deleted.');
        return redirect('/waiver');
    }
}
