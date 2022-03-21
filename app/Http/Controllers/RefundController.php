<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RefundController extends Controller
{
    public function __construct()
    {
        view()->share('pageName', 'refund');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Refund::all();
        return view('refunds.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('refunds.create');
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
            'payment_id' => 'required|exists:payments,id',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',//|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'status' => 'integer|in:0,1',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $record = Refund::create($request->except('_token'));
        $record->serial = 'RFND_'.$record->id;
        $record->save();
        return redirect()->route('refunds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function show(Refund $refund)
    {
        return view('refunds.show', compact('refund'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function edit(Refund $refund)
    {
        return view('refunds.edit', compact('refund'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refund $refund)
    {
        $validator = Validator::make($request->except('_token'), [
            'payment_id' => 'required|exists:payments,id',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',//|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'status' => 'integer|in:0,1',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $refund->update($request->except(['_token','serial','user_id']));
        return redirect()->route('refunds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refund $refund)
    {
        $refund->delete();
        return redirect()->route('refunds.index');
    }
}
