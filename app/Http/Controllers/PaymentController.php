<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Payment::all();
        return view('payments.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
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

        $validator = Validator::make($request->all(), [
            'serial' => 'required|string',
            'reason' => 'required|string',
            'payment' => 'required|integer',
            'refund_discount' => 'nullable|integer',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',//|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'paying_method' => 'required|string',
            'paid_for' => 'nullable|exists:users,id',
            'student_lecture_id' => 'nullable|exists:lecture_student,id',
            'edu_center_id' => 'nullable|exists:edu_centers,id',
            'is_vodafone' => 'nullable|in:0,1',
            'is_vf_trans' => 'nullable|in:0,1',
            'bank_id' => 'nullable|exists:banks,id',
            'registration_id' => 'nullable|exists:registrations,id',
            'authenticate_id' => 'nullable|exists:authenticates,id',
            'status' => 'required|integer|in:0,1,2',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        Payment::create($request->all());
        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        if ($request->serial) {
            $request->remove('serial');
        }
        $validator = Validator::make($request->all(), [
            'serial' => 'required|string',
            'reason' => 'required|string',
            'payment' => 'required|integer',
            'refund_discount' => 'nullable|integer',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',//|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'paying_method' => 'required|string',
            'paid_for' => 'nullable|exists:users,id',
            'student_lecture_id' => 'nullable|exists:lecture_student,id',
            'edu_center_id' => 'nullable|exists:edu_centers,id',
            'is_vodafone' => 'nullable|in:0,1',
            'is_vf_trans' => 'nullable|in:0,1',
            'bank_id' => 'nullable|exists:banks,id',
            'registration_id' => 'nullable|exists:registrations,id',
            'authenticate_id' => 'nullable|exists:authenticates,id',
            'status' => 'required|integer|in:0,1,2',
        ], []);
        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $payment->update($request->all());
        return redirect()->route('payments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index');
    }
}
