<?php

namespace App\Http\Controllers;

use App\Models\Authenticates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthenticatesController extends Controller
{
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
        return view('authenticates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
        Authenticates::create($request->all());
        return redirect()->route('authenticates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authenticates  $authenticates
     * @return \Illuminate\Http\Response
     */
    public function show(Authenticates $authenticates)
    {
        return view('authenticates.show', compact('authenticates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Authenticates  $authenticates
     * @return \Illuminate\Http\Response
     */
    public function edit(Authenticates $authenticates)
    {
        return view('authenticates.edit', compact('authenticates'));
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
        if ($request->serial) {
            $request->remove('serial');
        }
        $validator = Validator::make($request->all(), [
            // 'serial' => 'required|string',
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
        $authenticates->update($request->all());
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
