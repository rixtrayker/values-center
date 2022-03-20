<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LectureController extends Controller
{
    public function __construct()
    {
        view()->share('pageName', 'lecture');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Lecture::all();
        return view('lectures.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lectures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->except('_token'), [
            'teacher_id' => 'nullable|exists:teachers,id',
            'course_id' => 'required|exists:courses,id',
            'month' => 'nullable|string',
            'cost' => 'required|integer',
            'number_of_sessions' => 'required|integer',
            'start_date' => 'nullable|date',
            'day_one' => 'nullable|date',
            'day_two' => 'nullable|date',
            'date' => 'nullable|date',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        Lecture::create($request->except('_token'));
        return redirect()->route('lectures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        return view('lectures.show', compact('lecture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        return view('lectures.edit', compact('lecture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        $validator = Validator::make($request->except('_token'), [
            'teacher_id' => 'nullable|exists:teachers,id',
            'course_id' => 'required|exists:courses,id',
            'month' => 'nullable|string',
            'cost' => 'required|integer',
            'number_of_sessions' => 'required|integer',
            'start_date' => 'nullable|date',
            'day_one' => 'nullable|date',
            'day_two' => 'nullable|date',
            'date' => 'nullable|date',
        ], []);
        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $lecture->update($request->except('_token'));
        return redirect()->route('lectures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        return redirect()->route('lectures.index');
    }
}
