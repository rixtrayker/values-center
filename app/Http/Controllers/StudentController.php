<?php

namespace App\Http\Controllers;

use App\Models\EduCenter;
use App\Models\Lecture;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function __construct()
    {
        view()->share('pageName', 'student');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Student::all();
        return view('students.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centers = EduCenter::all();
        return view('students.create', compact('centers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['serial'] = '0';

        $validator = Validator::make($request->except('_token'), [
            'name' => 'required|string',
            'serial' => 'required|string',
            'mobile' => 'required',
            'grade' => 'string|nullable',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $record = Student::create($request->except('_token'));
        $record->serial = 'STU_'.$record->id;
        $record->save();
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $centers = EduCenter::all();
        return view('students.edit', compact(['student','centers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->except('_token'), [
            'name' => 'required|string',
            'mobile' => 'required',
            'grade' => 'string|nullable',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $student->update($request->except(['_token','serial']));
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }

    public function chooseStudent()
    {
        $students = Student::all();
        $lectures = Lecture::all();
        return view('students.lectures', compact('students', 'lectures'));
    }
    public function updateStudentLectures(Student $student)
    {
        return view('students.update-lectures', compact('student'));
    }

    public function attachLecturesPost(Request $request, Student $student)
    {
        //$user->roles()->sync([1 => ['expires' => true], 2, 3]);
        // [ 1=> ['status' => 1, 'payment_id' => 2 ] , 2 ...... ]
        //req.   status |  payment_id
        $student->lectures()->sync($request->lectures);
    }
}
