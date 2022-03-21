<?php

namespace App\Http\Controllers;

use App\Models\Catcher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CatcherController extends Controller
{
    public function __construct()
    {
        view()->share('pageName', 'catcher');
    }
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
        $users = User::all();
        return view('catchers.create', compact('users'));
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
            'serial' => 'required',
            // 'admin_name' => 'required',
            'student_name' => 'required',
            'mobile' => 'required',
            'notes' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
            'admin_id' => 'nullable|exists:users,id',
            'status' => 'nullable|integer|in:0,1,2,3',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $record = Catcher::create($request->except('_token'));
        $record->serial = 'CCHR_'.$record->id;
        $record->save();
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
        $validator = Validator::make($request->except('_token'), [
            'serial' => 'required',
            'admin_name' => 'required',
            'student_name' => 'required',
            'mobile' => 'required',
            'notes' => 'nullable|string',
            'comment' => 'nullable|string',
            'status' => 'required|integer|in:0,1,2,3',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $catcher->update($request->except(['_token','serial','user_id','admin_id','notes']));
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
