<?php

namespace App\Http\Controllers;

use App\Models\Authenticates;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticatesController extends Controller
{
    public function __construct()
    {
        view()->share('pageName', 'authenticates');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Authenticates::all();
        return view('authenticates.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('authenticates.create', compact('students'));
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
            'ACT1' => 'nullable|integer',
            'ACT2' => 'nullable|integer',
            'EST1' => 'nullable|integer',
            'EST2' => 'nullable|integer',
            'cost' => 'nullable|integer',
            'paid' => 'nullable|integer',
            'service' => 'nullable|integer',
            'send_score_times' => 'required|integer',
            'student_id' => 'required|exists:students,id',
            'status' => 'nullable|integer|in:0,1,2,3',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $record = Authenticates::create($request->except('_token'));
        $record->serial = 'AUTH_'.$record->id;
        $record->save();
        return redirect()->route('authenticates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authenticates  $authenticates
     * @return \Illuminate\Http\Response
     */
    public function show(Authenticates $authenticate)
    {
        return view('authenticates.show', compact('authenticate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Authenticates  $authenticates
     * @return \Illuminate\Http\Response
     */
    public function edit(Authenticates $authenticate)
    {
        $students = Student::all();
        return view('authenticates.edit', compact(['authenticate','students']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Authenticates  $authenticates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Authenticates $authenticates)
    {
        $validator = Validator::make($request->except('_token'), [
            'ACT1' => 'nullable|integer',
            'ACT2' => 'nullable|integer',
            'EST1' => 'nullable|integer',
            'EST2' => 'nullable|integer',
            'cost' => 'nullable|integer',
            'paid' => 'nullable|integer',
            'service' => 'nullable|integer',
            'send_score_times' => 'required|integer',
            'student_id' => 'required|exists:students,id',
            'status' => 'nullable|integer|in:0,1,2,3',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $authenticates->update($request->except(['_token','serial','user_id']));
        return redirect()->route('authenticates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Authenticates  $authenticates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Authenticates $authenticates)
    {
        $authenticates->delete();
        return redirect()->route('authenticates.index');
    }
}
