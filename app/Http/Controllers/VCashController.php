<?php

namespace App\Http\Controllers;

use App\Models\VCash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VCashController extends Controller
{
    public function __construct()
    {
        view()->share('pageName', 'Vodafone Cash');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = VCash::all();
        return view('vcashes.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vcashes.create');
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
            'number' => 'required|string|unique:v_cashes,number',
            'init_balance' => 'required|integer',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        VCash::create($request->except('_token'));
        return redirect()->route('vcashes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VCash  $vCash
     * @return \Illuminate\Http\Response
     */
    public function show(VCash $vCash)
    {
        return view('vcashes.show', compact('vCash'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VCash  $vCash
     * @return \Illuminate\Http\Response
     */
    public function edit(VCash $vCash)
    {
        return view('vcashes.edit', compact('vCash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VCash  $vCash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VCash $vCash)
    {
        $validator = Validator::make($request->except('_token'), [
            'number' => 'required|string|unique:v_cashes,number',
            'init_balance' => 'required|integer',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $vCash->update($request->except('_token'));
        return redirect()->route('vcashes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VCash  $vCash
     * @return \Illuminate\Http\Response
     */
    public function destroy(VCash $vCash)
    {
        $vCash->delete();
        return redirect()->route('vcashes.index');
    }
}
