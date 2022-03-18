<?php

namespace App\Http\Controllers;

use App\Models\Catcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatcherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Catcher::all();
        return view('catchers.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catchers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request['serial'] =
        $validator = Validator::make($request->except('_token'), [
            'serial' => 'required',
            'name' => 'required|string',
            'serial' => 'required',
            'admin_name' => 'required',
            'student_name' => 'required',
            'mobile' => 'required',
            'notes' => 'required',
            'status' => 'nullable|integer|in:0,1,2,3',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        Catcher::create($request->except('_token'));
        return redirect()->route('catchers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catcher  $catcher
     * @return \Illuminate\Http\Response
     */
    public function show(Catcher $catcher)
    {
        return view('catchers.show', compact('catcher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catcher  $catcher
     * @return \Illuminate\Http\Response
     */
    public function edit(Catcher $catcher)
    {
        return view('catchers.edit', compact('catcher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catcher  $catcher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catcher $catcher)
    {
        if ($request->serial) {
            $request->remove('serial');
        }
        $validator = Validator::make($request->except('_token'), [
            'name' => 'required|string',
            'serial' => 'required',
            'admin_name' => 'required',
            'student_name' => 'required',
            'mobile' => 'required',
            'notes' => 'required',
            'status' => 'nullable|integer|in:0,1,2,3',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $catcher->update($request->except('_token'));
        return redirect()->route('catchers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catcher  $catcher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catcher $catcher)
    {
        $catcher->delete();
        return redirect()->route('catchers.index');
    }
}
