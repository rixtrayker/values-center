<?php

namespace App\Http\Controllers;

use App\Models\EduCenter;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function __construct()
    {
        view()->share('pageName', 'registration');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Registration::all();
        return view('registrations.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $centers = EduCenter::all();
        return view('registrations.create', compact(['students','centers']));
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
        $request['user_id'] = Auth::id();
        $validator = Validator::make($request->except('_token'), [
            'serial' => 'required|string',
            'test_center' => 'required|string',
            'student_id' => 'required|exists:students,id',
            'edu_center_id' => 'required|exists:edu_centers,id',
            'status' => 'required|integer|in:0,1,2',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $record = Registration::create($request->except('_token'));
        $record->serial = 'REG_'.$record->id;
        $record->save();
        return redirect()->route('registrations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        return view('registrations.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        $students = Student::all();
        $centers = EduCenter::all();
        return view('registrations.edit', compact(['registration','students','centers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        $validator = Validator::make($request->except('_token'), [
            'test_center' => 'required|string',
            'student_id' => 'required|exists:students,id',
            'edu_center_id' => 'required|exists:edu_centers,id',
            'status' => 'required|integer|in:0,1,2',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $registration->update($request->except(['_token','serial','user_id']));
        return redirect()->route('registrations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect()->route('registrations.index');
    }
}
